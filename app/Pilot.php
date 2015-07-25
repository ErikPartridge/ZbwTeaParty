<?php namespace App;

use Illuminate\Database\Eloquent\Model;

 class Pilot extends Model {

	//
	private $first;

	private $last;

	private $cid;

	private $email;

	private $queued_cards;

	private $secure_key;
	
	public function flights(){
		return Flight::where('pilot_id', '=', $this->id)->get();
	}

	public function cards(){
		return Card::where('pilot_id', '=', $this->id)->get();
	}
}
