<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Flight;
use App\Pilot;
use App\Card;
use App\Deck;
use App\Services\AirportManager;
use App\Services\Pokerer;
use Storage;

class PokerController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($cid, $key)
    {
        $pilot = Pilot::where('cid', '=', $cid)->firstOrFail();
        if($pilot->secure_key != $key){
            return redirect('/');
        }else{
            $cards = array();
            $pilotCards = Card::where('pilot_id', '=', $pilot->id)->get();
            return view('hand')->with('cards', $pilot->cards)->with('queued_cards', $pilot->queued_cards)->with('pilot', $pilot);
        }
    }

    public function delete($cid){
        $pilot = Pilot::where('cid', '=', $cid)->firstOrFail();
        if($pilot->queued_cards > 0){
            $pilot->queued_cards = $pilot->queued_cards - 1;
            return 'success';
        }else{
            $pilot->cards()->random()->delete();
            return 'card removed';
        }
        return 'failed';
    }

    public function deal($cid){
        $pilot = Pilot::where('cid', '=', $cid)->firstOrFail();
        Pokerer::dealCard($pilot->id);
        return 'success';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($cid)
    {
        $pilot = Pilot::where('cid', '=', $cid)->firstOrFail();
        $cards = array();
        $pilotCards = Card::where('pilot_id', '=', $pilot->id)->where(->get();
        return view('hand')->with('cards', $cards)->with('queued_cards', $pilot->queued_cards)->with('pilot', $pilot);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($cid, $key)
    {   
        $pilot = Pilot::where('cid', '=', $cid)->firstOrFail();
        if($pilot->secure_key != $key){
            return redirect('/');
        }else{
            $cardId = $request->input('card-discard');
            $card = Card::find($cardId);
            if($card->pilot_id === $pilot->id){
                $card->delete();
            }
            if($pilot->queued_cards > 0){
                $pilot->queued_cards = $pilot->queued_cards - 1;
                Pokerer::dealCard($pilot->id);
            }
            return view('hand')->with('cards', $pilot->cards)->with('queued_cards', $pilot->queued_cards)->with('pilot', $pilot);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $flight = Flight::find($id);
            if($flight->landed){
                return 'Landed and logged';
            }else if($flight->takenoff){
                return 'Airborne';
            }else{
                return 'Not yet airborne or online (there may be up to a four minute delay)';
            }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
