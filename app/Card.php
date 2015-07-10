<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    private $pilot_id;

    private $deck_id;

    private $type;

    public function deck(){
    	return this->belongsTo('deck');
    }

}
