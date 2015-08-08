<?php namespace App\Services;

use App\Flight;
use App\Pilot;
use Cache;
use Vatsimphp\VatsimData;
use Carbon\Carbon as Carbon;
use Storage;
use App\Deck;
use \League\Geotools\Coordinate\Coordinate as Coordinate;
use \League\Geotools\Geotools as Geotools;
use Mail;

class Pokerer{
	
	public static function fetchData(){
		$vatsim = new VatsimData();
		$vatsim->loadData();
		$start = Carbon::create(2015, 8, 8, 12, 0, 0, 'UTC');
		$end = Carbon::create(2015, 8, 8, 23, 59 ,0, 'UTC');
		$now = Carbon::now('UTC');
		if(!$now->gt($start) || !$now->lt($end)){
		    $data = self::filterFlightData($vatsim->getClients()->toArray());
		    self::checkForAirbornes($data);
		    self::checkForLandings($data);
		}
		Storage::put('data/'.Carbon::now().' VATSIM.json.gz', gzencode(json_encode($vatsim->getClients()->toArray())));
	} 

	public static function createNewDeck(){
		$deck = new Deck;
		$deck->save();
		if(Deck::all()->count() === 1){
			$deck = new Deck;
			$deck->save();
		}
		$deck->fillDeck();
		$deck->save();
	}

	public static function dealCard($id){
		$pilot = Pilot::find($id);
		$cards = $pilot->cards();
		$cardIds = array();
		foreach($cards as $card){
			array_push($cardIds, $card->type);
		}
		$card = NULL;
		if($cards->count() === 5){
			$pilot->queuedCards = $pilot->queuedCards + 1;
			$pilot->save();
			return 1;
		}
		do{
			if(!Deck::cardsAvailable()){
				createNewDeck();
			}
			$inDeck = Card::where('pilot_id', '!=', 1)->where('deck_id', '!=', 1)->get();
			$card = $inDeck->random();
		}while(in_array($card->type, $cardIds));
		if($card->pilot_id === 1 && $card->deck_id !== 1){
			$card->pilot_id = $id;
			$card->deck_id = 1;
			$card->save();
		}
		return 1;
	}

	private static function distanceToDestination($flight){
		$flightLocation = new Coordinate($flight['latitude'].', '.$flight['longitude']);
		$destinationLocation = new Coordinate(AirportManager::fetchData($flight['planned_destairport']));
		$geotools = new Geotools();
		return $geotools->distance()->setFrom($flightLocation)->setTo($destinationLocation)->in('mi')->greatCircle();
	}

	/*
		returns the integer id of the matching flight, 0 if no match
	*/
	private static function findMatchingFlight($flight){
		$callsignMatches = Flight::where('callsign', '=', $flight['callsign']);
		//If there are more than one
		if($callsignMatches->count() > 0){
			$callsignAndPilot = array();
			//Matching the pilot's CID
			$collection = $callsignMatches->get();
			foreach($collection as $instance){
				if(!is_null($instance->pilot_id) && $instance->pilot_id !== 1 && $instance->pilot_id !== 0){
					$pilot = Pilot::find($instance->pilot_id);
					if($pilot->cid == $flight['cid']){
						array_push($callsignAndPilot, $instance);
					}
				}
			}
			//If there's only one, that's easy, this should be the most frequeny, maybe please hopefully
			if(count($callsignAndPilot) === 1){
				$f = $callsignAndPilot[0];
				if($f->departs == $flight['planned_depairport'] && $f->arrives == $flight['planned_destairport']){
					$results = array();
					//They better have put it in their remarks
					preg_match("/TP-\\d+/", $flight['planned_remarks'], $results);
					if(count($results) > 0){
						$id = intval(explode(' ', $results[0])[1]);
						if($callsignAndPilot[0]->callsign != Flight::find($id)->callsign){
							\Log::debug('Someone isnt using the right id: callsign'.$callsignAndPilot[0]->callsign.' id '.$id);
						}
					}
					return $callsignAndPilot[0]->id;
				}
				//Otherwise, we have to search
			}else if(count($callsignAndPilot) > 1){
				$results = array();
				//They better have put it in their remarks
				preg_match("/TP-\\d+/", $flight['planned_remarks'], $results);
				if(count($results) > 0){
					$id = intval(explode(' ', $results[0])[1]);
					foreach($callsignAndPilot as $dataitem){
						if($dataitem->id == $id && $dataitem->departs == $flight['planned_depairport'] && $dataitem->arrives == $flight['planned_destairport']){
							return $dataitem->id;
						}
					}
				}
				//Welp
			}
		}else{
			//This is what happens when they aren't using the right callsign for some reason
			$results = array();
			//They better have put it in their remarks
			preg_match("/TP-\\d+/", $flight['planned_remarks'], $results);
			if(count($results) > 0){
				$id = intval(explode('-', $results[0])[1]);
				$dataitem = Flight::find($id);
				if(Pilot::find($dataitem->pilot_id)->cid == $flight['cid']){
					return $dataitem->id;
				}else{
					return 0;
				}
				
			}
		}		
	}

	public static function checkForAirbornes($data){
		$now = Carbon::now('UTC');
		$start = Carbon::create(2015, 8, 8, 12, 0, 0, 'UTC');
		$end = Carbon::create(2015, 8, 8, 23, 0 ,0, 'UTC');
		if(!$now->gt($start) || !$now->lt($end)){
		    return 0;
		}
		foreach($data as $flight){
			$distance = self::distanceToDestination($flight);
			//Make sure it ain't landing
			if($distance > 3){
				//Okay it's taking off
				if($flight['groundspeed'] > 85 && $flight['altitude'] > 2000){
					$matchId = self::findMatchingFlight($flight);
					if($matchId != 0){
						$dbFlight = self::findMatchingFlight($flight);
						$f = Flight::find($dbFlight);
						if(!$f->takenoff){
							$f->takenoff = true;
							$f->save();
						}
					}
				}	
			}

		}
		return 1;
	}

	public static function checkForLandings($data){
		$now = Carbon::now('UTC');
		$start = Carbon::create(2015, 8, 8, 16, 0, 0, 'UTC');
		$end = Carbon::create(2015, 8, 8, 23, 1 ,59, 'UTC');
		if(!$now->gt($start) || !$now->lt($end)){
		    return 0;
		}
		foreach($data as $flight){
			$distance = self::distanceToDestination($flight);
			if($distance < 3){
				if($flight['altitude'] < 3000){
					$matchId = self::findMatchingFlight($flight);
					if($matchId != 0){
						$dbFlight = self::findMatchingFlight($flight);
						$f = Flight::find($dbFlight);
						if($f->takenoff && !$f->landed){
							$f->landed = true;
							$f->save();
							if($f->poker){
								$pilot = $f->pilot();
								$cardString = '';
								if($pilot->cards()->count() === 0){
									self::dealCard($pilot);
								}
								self::dealCard($pilot);
								foreach($pilot->cards() as $card){
									$cardString = $card->type.' '.$cardString;
								}

								$cardString = trim($cardString);
								$newCards = trim($newCards);
								Mail::queue('landing-complete', ['first' => $pilot->first, 'callsign' => $f->callsign, 'cardString' => $cardString, 'queuedCards' => $pilot->queuedCards, 'cid' => $pilot->cid, 'secure_key' => $pilot->secure_key], function($message) use ($pilot){
									$message->subject('Cards Dealt')->to($pilot->email, $pilot->first.' '.$pilot->last);
								});
							}
						}
					}
				}	
			}

		}
		return 1;
	}

	public static function filterFlightData($data){
		$carbon = Carbon::now('UTC');
        if($carbon->year === 2015  && $carbon->month === 8 && $carbon->day === 8){
        	$result = array();
			foreach($data as $flight){
				if(Pilot::where('cid', '=', $flight['cid'])->count() === 1){
					array_push($result, $flight);
				}
			}
			return $result;
        }else{
        	return array();
        }
        
	}

	public static function alreadyActive($cid){
		$pilot = Pilot::where('cid', '=', $cid)->firstOrFail();
		$flights = $pilot->flights();
		$isActive = 0;
		foreach($flights as $flight){
			if($flight->takenoff && !$flight->landed){
				if($isActive != 0 && $isActive != $flight->id){
					$activeFlight = Flight::find($isActive);
					if($activeFlight->takenoff && !$activeFlight->landed){
						$activeFlight->takenoff = 0;
						$callOne = $activeFlight->callsign;
						$callTwo = $flight->callsign;
						$name = $pilot->first;
						Mail::queue('emails.flight-cancelled', array('callsignOne', $callOne, 'callsignTwo', $callTwo, 'name', $name), function($message) use ($pilot){
							$message->replyTo('events@bostonartcc.net', $name = 'Camden Bruno');
							$message->to($pilot->email, $name = $pilot->first.' '.$pilot->last)->subject('Incomplete Flight Cancelled')->bcc('events@bostonartcc.net', $name = 'Camden Bruno');
						});
						Storage::append('flight_log/log.txt', 'Cancelled flight '.$activeFlight->callsign.' in favor of '.$flight->callsign.'\n');
					}
					$isActive = $flight->id;
				}
			}
		}
	}
}
