<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Pilot extends Model {

	//
	private $first;

	private $last;

	private $cid;

	private $email;

	public function flight(){
		return $this->hasMany('Flight');
	}

}
