<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Pilot extends Model {

	//
	private $first;

	private $last;

	private $cid;

	private $email;

	public flight(){
		return $this->hasOne('Flight');
	}

}
