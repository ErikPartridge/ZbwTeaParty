<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model {

	//
	private $callsign;

	private $departure;

	private $arrival;

	private $arrives;

	private $departs;

	private $aircraft_type;

	private $booked;


	public function user(){
		return $this->belongsTo('Pilot');
	}
}
