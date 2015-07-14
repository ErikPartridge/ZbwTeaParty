<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deck extends Model
{
    
    protected static $card_names = array (
	'2C' => '2 of Clubs',
	'2D' => '2 of Diamonds',
	'2H' => '2 of Hearts',
	'2S' => '2 of Spades',
	'3C' => '3 of Clubs',
	'3D' => '3 of Diamonds',
	'3H' => '3 of Hearts',
	'3S' => '3 of Spades',
	'4C' => '4 of Clubs',
	'4D' => '4 of Diamonds',
	'4H' => '4 of Hearts',
	'4S' => '4 of Spades',
	'5C' => '5 of Clubs',
	'5D' => '5 of Diamonds',
	'5H' => '5 of Hearts',
	'5S' => '5 of Spades',
	'6C' => '6 of Clubs',
	'6D' => '6 of Diamonds',
	'6H' => '6 of Hearts',
	'6S' => '6 of Spades',
	'7C' => '7 of Clubs',
	'7D' => '7 of Diamonds',
	'7H' => '7 of Hearts',
	'7S' => '7 of Spades',
	'8C' => '8 of Clubs',
	'8D' => '8 of Diamonds',
	'8H' => '8 of Hearts',
	'8S' => '8 of Spades',
	'9C' => '9 of Clubs',
	'9D' => '9 of Diamonds',
	'9H' => '9 of Hearts',
	'9S' => '9 of Spades',
	'10C' => '10 of Clubs',
	'10D' => '10 of Diamonds',
	'10H' => '10 of Hearts',
	'10S' => '10 of Spades',
	'JC' => 'Jack of Clubs',
	'JD' => 'Jack of Diamonds',
	'JH' => 'Jack of Hearts',
	'JS' => 'Jack of Spades',
	'QC' => 'Queen of Clubs',
	'QD' => 'Queen of Diamonds',
	'QH' => 'Queen of Hearts',
	'QS' => 'Queen of Spades',
	'KC' => 'King of Clubs',
	'KD' => 'King of Diamonds',
	'KH' => 'King of Hearts',
	'KS' => 'King of Spades',
	'AC' => 'Ace of Clubs',
	'AD' => 'Ace of Diamonds',
	'AH' => 'Ace of Hearts',
	'AS' => 'Ace of Spades'
);


    public function fill_deck(){
    	if($this->id === 1){
    		return 0;
    	}
    	foreach($card_names as $key => $value){
    		$card = new Card;
    		$card->deck_id = $this->id;
    		$card->type = $key;
    		$card->pilot_id = 1;
    		$card->save();
    	}
    }

    public static function name($id){
    	return $card_names[$id];
    }

 

    public static function cardsAvailable(){
    	return self::where('pilot_id', '!=', 1)->where('deck_id', '!=', 1)->count() > 0;
    }

}
