<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Flight as Flight;
use App\Pilot as Pilot;
use Illuminate\Http\Request;
use Validator;
use Session;
use Mail;
use Cache;
use Vatsimphp\VatsimData;

class FlightController extends Controller {

	/*public function test(){
		$vatsim = new VatsimData();
		$vatsim->loadData();
		$pilots = $vatsim->getPilots()->toArray();
		return $pilots[3]['callsign'];
	}*/

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
		$pilot = Pilot::where('id', '=', $flight->pilot_id)->firstOrFail();
		if(!$flight->booked){
			return redirect('/');
		}
		if($poker){
			$flight->poker = true;
			$name = $pilot->first.' '.$pilot->last;
			$email = $pilot->email;
			$flight->save();
			Mail::queue('emails.custom-poker-yes', ['flight' => $flight->callsign, 'name' => $name], function($message) use ($email, $name){
				$message->to($email, $name)->subject('Tea Party Poker Confirmation');
			});
		}else{
			$flight->poker = false;
			$name = $pilot->first.' '.$pilot->last;
			$email = $pilot->email;
			$flight->save();
			Mail::queue('emails.custom-poker-no', ['flight' => $flight->callsign, 'name' => $name], function($message) use ($email, $name){
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
    		Session::flash('success', 'party in the usa');
    		Mail::queue('emails.booking', [ 'flight_id' => $flight->id, 'name' => $name, 'cid' => $request->cid], function($message) use($email, $name)
    		{
    			\Log::error('Queueing');
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
			'cid'   => 'required',
			'email' => 'required|email|max:255',
			//Now on to the pilot stuff
			'callsign' => 'required|max:10',
			'aircraft' => 'required|max:8',
			'departs'  => 'required|alpha_num|min:3|max:4',
			'arrives'  => 'required|alpha_num|min:3|max:4',
			'cruise'   => 'required|alpha_num|max:7',
			'deptttime' => 'required',
			'arrtime'  => 'required'
		]);
		if(0){
			Session::flash('failure', 'validator');
			return redirect('/custom-booking');
		}else{
			$pilot = null;
			if(Pilot::where('email', '=', $request->email)->count() == 1){
    			$pilot = Pilot::where('email', '=', $request->email)->firstOrFail();
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
			$departuretime = substr($request->depttime,0,2).':'.substr($request->depttime, 2,2).':00';
			$arrivaltime = substr($request->arrtime,0,2).':'.substr($request->arrtime, 2,2).':00';
			$flight->departure = $departuretime;
			$flight->arrival = $arrivaltime;
			$flight->departs = $request->departs;
			$flight->arrives = $request->arrives;
			$flight->altitude = $request->cruise;
			$flight->aircraft_type = $request->aircraft;
			$flight->route = $request->route;
			$flight->pilot_id = $pilot->id;
			$flight->poker = 0;
			$flight->booked = true;
			$flight->save();
			$email = $request->email;
    		$fullname = $request->first.' '.$request->last;
    		$name = $request->first;
    		Mail::queue('emails.custom-booking', [ 'flight_id' => $flight->id, 'name' => $name, 'cid' => $request->cid], function($message) use($email, $fullname)
    		{
    			\Log::error('Queueing Main');
    		    $message->to($email, $fullname)->subject('Your Tea Party Booking');
    		});

    		Mail::queue('emails.ec-custom', [ 'flight_id' => $flight->id, 'name' => $fullname, 'email' => $email, 'cid' => $request->cid], function($message) use($email, $fullname)
    		{
    			\Log::error('Queueing Main');
    		    $message->to('events@bostonartcc.net', 'Camden Bruno')->subject('Tea Party Booking');
    		});
    		
    		/**Mail::queue('emails.ec-custom', [ 'flight_id' => $flight->id, 'email' => $email, 'name' => $fullname, 'cid' => $request->cid], function($message)
    		{
    			\Log::error('Queueing EC');
    		    $message->send('events@bostonartcc.net', 'Camden Bruno')->subject('Tea Party Booking Awaiting Approval');
    		});*/
    		
    		Session::flash('success', 'party in the usa');
    		return redirect('/booking/'.$flight->hash);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  string  $hash
	 * @return Response
	 */
	public function show($hash)
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
