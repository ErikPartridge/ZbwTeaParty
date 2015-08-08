<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('welcome');
	}

	public function poker()
	{
		return view('poker');
	}


	public function feedback(){
		$input = Request::all();
		/*$validator = Validator::make($input,
			'email' => 'required|email',
            'your_name' => 'required',
            'cid' => 'required|numeric'
		);*/
		/*if(!validator->fails()){
			Storage::append($input);
			Mail::send('emails.feedback', $input, function($message){
				$message->to('atm@bostonartcc.net', 'Francesco Dubé')->subject('Feedback, yay!');
			});
			return redirect('/');
		}else{
			return redirect('/404');
		}*/
	}

}
