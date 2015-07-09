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

class Pokerer{
	
	public static function fetchData(){
		$vatsim = new VatsimData();
		$vatsim->loadData();
		Storage::put('data/'.Carbon::now().' VATSIM.json.gz', gzencode(json_encode($vatsim->getClients()->toArray())));
	} 

	public static function createNewDeck(){
		$deck = new Deck;
		
	}

	public static function checkForAirbornes($data){

	}

	public static function checkForLandings($data){

	}

	public static function filterFlightData($data){
        $result = array();
		for($data as $flight){
			
			if(Pilot::where('cid', '=', $flight['cid'])->count() === 1){
				$flights = Pilot::where('cid', '=', $flight['cid']);
			}
		}
	}

}