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

	}

	public static function checkForAirbornes($data){
		for($data as $flight){
			$flightLocation = new Coordinate($flight['latitude'].', '.$flight['longitude']);
			$destinationLocation = AirportManager::fetchData($flight['planned_destairport']);
			$distance = new Geotools()->distance()->setFrom($flightLocation)->setTo($destinationLocation)->in('mi')->greatCircle();
			//Make sure it ain't landing
			if($distance > 6 && !$flight->landed && !$flight->takenoff){
				//Okay it's taking off
				if($flight['groundspeed'] > 85 && $flight['altitude'] > 2000){
					//Matching callsigns-- this will get the most matches
					$callsignMatches = Flight::where('callsign', '=', $flight['callsign'])->with('pilot');
					//If there are more than one
					if($callsignMatches->count() > 0){
						$callsignAndPilot = array();
						//Matching the pilot's CID
						for($callsignMatches as $instance){
							if($instance->pilot()->cid == $flight['cid']){
								array_push($callsignAndPilot, $instance);
							}
						}
						//If there's only one, that's easy
						if(count($callsignAndPilot) === 1){
							alreadyActive($flight['cid']);
							$callsignAndPilot[0]->takenoff = true;
							$callsignAndPilot[0]->save();
							//Otherwise, we have to search
						}else if(count($callsignAndPilot) > 1){
							$results = array();
							//They better have put it in their remarks
							preg_match("TP-\\d+", $flight['planned_remarks'], $matches=$results);
							if(count($results) > 0){
								$id = intval(explode(' ', $results[0])[1]);
								for($callsignAndPilot as $dataitem){
									if($dataitem->id == $id){
										$dataitem->takenoff = true;
										$dataitem->save();
									}
								}
							}
							//Welp
						}
					}else{
						//This is what happens when they aren't using the right callsign for some reason

					}
				}	
			}

		}
	}

	public static function checkForLandings($data){

	}

	public static function filterFlightData($data){
		$carbon = Carbon::now('UTC');
        if($carbon->year === 2015  && $carbon->month === 8 && $carbon->day === 8){
        	$result = array();
			for($data as $flight){
				if(Pilot::where('cid', '=', $flight['cid'])->count() === 1){
					array_push($result, $f);
				}
			}
			return $result;
        }else{
        	return array();
        }
        
	}

	private static function alreadyActive($cid){
		$pilot = Pilot::where('cid', '=', $cid)->firstOrFail();
		$flights = $pilot->flights();
		$isActive = 0;
		for($flights as $flight){
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