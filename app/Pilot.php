<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Pilot extends Model {

	//
	private $first;

	private $last;

	private $cid;

	private $email;

	private $queued_cards;
	
	public function flights(){
		return $this->hasMany('Flight');
	}

	public function cards(){
		return $this->hasMany('Card');
	}
}
