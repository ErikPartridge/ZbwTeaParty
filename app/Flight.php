<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model {

	//
	private $callsign;

	private $departure;

	private $arrival;

	private $arrives;

	private $altitude;

	private $departs;

	private $aircraft_type;

	private $route;

	private $booked;


	public function user(){
		if($this->pilot_id != null){
			return $this->belongsTo('Pilot');
		}else{
			return null;
		}
	}
}
