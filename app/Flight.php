<?php namespace App;

use Illuminate\Database\Eloquent\Model;

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

	public function user(){
		if($this->pilot_id != null && $this->pilot_id != 0){
			return $this->belongsTo('Pilot');
		}else{
			return null;
		}
	}

	public function active(){
		return $this->takenoff && !$this->landed;
	}
}
