<?php namespace App\Services;

use App\Flight;
use App\Pilot;
use Cache;
use Vatsimphp\VatsimData;
use Carbon\Carbon as Carbon;
use Storage;
use App\Deck;

class Pokerer{
	
	public static function fetchData(){
		$vatsim = new VatsimData();
		$vatsim->loadData();
		Storage::put('data/'.Carbon::now().' VATSIM.json.gz', gzencode(json_encode($vatsim->getClients()->toArray())));
	} 

	public static function createNewDeck(){
		$deck = new Deck;
		
	}

}