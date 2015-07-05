<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Flight as Flight;
use App\Pilot as Pilot;
use Illuminate\Http\Request;
use Validator;
use Session;
use Mail;


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

	public function custom(){
		return view('custom');
	}

	public function approve($hash, $poker){
		$flight = Flight::where('hash', '=', $hash)->firstOrFail();
		$pilot = Pilot::where('id', '=', $flight->pilot_id);
		if(!$flight->booked){
			return redirect('/');
		}
		if($poker){
			$flight->poker = true;
			$name = $pilot->first.' '.$pilot->last;
			$email = $pilot->email;
			$flight->save();
			Mail::queue('emails.custom-poker-yes', ['flight' => $flight, 'name' => $name], function($message) use ($email, $name){
				$message->to($email, $name)->subject('Tea Party Poker Confirmation');
			});
		}else{
			$flight->poker = false;
			$name = $pilot->first.' '.$pilot->last;
			$email = $pilot->email;
			$flight->save();
			Mail::queue('emails.custom-poker-no', ['flight' => $flight, 'name' => $name], function($message) use ($email, $name){
				$message->to($email, $name)->subject('Tea Party Poker Denied');
			});
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		$v = Validator::make($request->all(), [
        	'name' => 'required|max:255|regex:/^(.*\s+.*)+$/',
        	'cid' => 'required|numeric',
        	'email' => 'required|email|max:255',
        	'id' => 'required|numeric'
    	]);
    	if($v->fails()){
    		Session::flash('failure', 'validator');
    		return redirect("/booking/".Flight::findOrFail($request->id)->hash);
    	}else{
    		$flight = Flight::findOrFail($request->id);
    		if($flight->booked){
    			Session::flash('failure', 'booked');
    			return redirect('/booking');
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
    		$email = $request->email;
    		$name = $request->name;
    		Session::flash('success');
    		Mail::send('emails.booking', [ 'flight' => $flight, 'name' => $name, 'cid' => $request->cid], function($message) use($email, $name)
    		{
    		    $message->to($email, $name)->subject('Your Tea Party Booking');
    		});
    		return redirect("/booking/".Flight::findOrFail($request->id)->hash);
    	}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$validator = Validator::make($request->all(),[
			'first' => 'required|max:255',
			'last'  => 'required|max:255',
			'cid'   => 'required|numeric',
			'email' => 'required|email|max:255',
			//Now on to the pilot stuff
			'callsign' => 'required||max:10',
			'aircraft' => 'required|max:8',
			'departs'  => 'required|alpha_num|min:3|max:4',
			'arrives'  => 'required|alpha_num|min:3|max:4',
			'cruise'   => 'required|alpha_num|max:7',
			'deptttime' => 'required|min:4|max:4',
			'arrtime'  => 'required|min:4|max:4'
		]);
		if($validator->fails()){
			Session::flash('failure', 'validator');
			return redirect('/custom-booking');
		}else{
			$pilot = null;
			if(Pilot::where('email', '=', $request->email)->count() == 1){
    			$pilot = Pilot::where('email', '=', $request->email)->firstOrFail()->id;
    		}else{
			$pilot = new Pilot;
			$pilot->first = $request->first;
			$pilot->last = $request->last;
			$pilot->cid  = $request->cid;
			$pilot->email = $request->email;
			$pilot->save();
			}
			$flight = new Flight;
			$flight->callsign = $request->callsign;
			$flight->departure = $request->depttime.'00';
			$flight->arrival = $request->arrtime.'00';
			$flight->departs = $request->departs;
			$flight->arrives = $request->arrives;
			$flight->altitude = $request->cruise;
			$flight->aircraft_type = $request->aircraft;
			$flight->route = $request->route;
			$flight->pilot_id = $pilot->id;
			$flight->poker = 0;
			$flight->save();
			$email = $request->email;
    		$fullname = $request->first.' '.$request->last;
    		$name = $request->first;
    		Mail::send('emails.custom-booking', [ 'flight' => $flight, 'name' => $name, 'cid' => $request->cid], function($message) use($email, $fullname)
    		{
    		    $message->to($email, $fullname)->subject('Your Tea Party Booking');
    		});
    		if($request->poker){
    		Mail::send('emails.ec-custom', [ 'flight' => $flight, 'email' => $email, 'name' => $fullname, 'cid' => $request->cid], function($message)
    		{
    		    $message->to('events@bostonartcc.net', 'Camden Bruno')->subject('Tea Party Booking Awaiting Approval');
    		});
    		}
    		Session::flash('success');
    		return redirect('/booking/'.$flight->hash);
		}
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
	 * @param  string $cid
	 * @return Response
	 */
	public function destroy($hash)
	{
		$flight = Flight::where('hash', '=', $hash)->firstOrFail();
			$flight->pilot_id = 1;
			$flight->booked = false;
			$flight->save();
			return redirect('/booking');

	}

}
