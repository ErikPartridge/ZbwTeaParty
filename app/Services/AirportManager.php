<?php namespace App\Services;

use App\Flight;
use App\Pilot;
use Cache;
use Vatsimphp\VatsimData;
use Carbon\Carbon as Carbon;
use Storage;


class AirportManager{
	

	public static function fetchData($icao){
		if(Cache::has($icao)){
			return Cache::get($icao);
		}else{
			$json = Storage::get('airports.json');
			$obj = json_decode($json, true);
			$airport= $obj[$icao];
			$latlng = $airport['lat'].', '.$airport['lon'];
			Cache::put($icao, $latlng, 420);
			return $latlng;
		}
		
	}

}