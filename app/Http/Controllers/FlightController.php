<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Flight as Flight;
use App\Pilot as Pilot;
use Illuminate\Http\Request;

class FlightController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('bookings')->with('flights', Flight::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$v = Validator::make($request->all(), [
        	'name' => 'required|max:255|alpha_dash|regex:^(.*\s+.*)+$',
        	'cid' => 'required|numeric|min:6|max:7',
        	'email' => 'required|email|max:255',
        	'id' => 'required|numeric'
    	]);
    	if($v->fails()){
    		Session::flash('failure', 'validator');
    		return redirect("/bookings//".Flight::findOrFail($request->id)->hash);
    	}else{
    		$flight = Flight::findOrFail($request->id);
    		if($flight->booked){
    			Session::flash('failure', 'booked');
    			return redirect('/bookings');
    		}
    		$flight->booked = true;
    		if(Pilot::where('email', '=', $request->email)->count() == 1){
    			$flight->pilot_id = Pilot::where('email', '=', $request->email)->firstOrFail()->id;
    		}else{
    			$pilot = new Pilot;
    			$pilot->first = explode(' ', $request->name)[0];
    			$pilot->last = explode(' ', $request->name)[1];
    			$pilot->cid = $request->cid;
    			$pilot->email = $request->email;
    			$pilot->save();
    			$flight->pilot_id = $pilot->id;
    		}
    		$flight->save();
    		Mail::send('emails.booking', ['flight' => $flight, 'name' => $request->name], function($message)
    		{
    		    $message->to($request->email, $request->name)->subject('Your Tea Party Booking');
    		});
    	}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  string  $hash
	 * @return Response
	 */
	public function show( $hash)
	{
		$flight = Flight::where('hash', '=', $hash)->firstOrFail();
		if($flight == null){
			return redirect('/bookings');
		}
		return view('booking')->with('flight', $flight);
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
	 * @param  string $hash
	 * @return Response
	 */
	public function destroy($hash)
	{
		$flight = Flight::where('hash', '=', $hash)->firstOrFail();
		$flight->pilot_id = 0;
		$flight->booked = false;
		$flight->save();
	}

}
