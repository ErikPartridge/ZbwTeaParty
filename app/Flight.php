<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Pilot;

class Flight extends Model {

	//
	private $callsign;

	//These are times
	private $departure;

	private $arrival;

	//These are airports
	private $arrives;

	private $altitude;

	private $departs;

	private $aircraft_type;

	private $route;

	private $booked;

	private $hash;

	private $poker;

	private $takenoff;

	private $landed;

	public function pilot(){
		return Pilot::find($this->pilot_id);
	}

	public function active(){
		return $this->takenoff && !$this->landed;
	}
}
