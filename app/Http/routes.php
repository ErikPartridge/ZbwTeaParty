<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::post('/', 'WelcomeController@feedback');

Route::get('/poker', 'WelcomeController@poker');

Route::get('/home', 'HomeController@index');

Route::get('/booking', 'FlightController@index');

Route::post('/booking', 'FlightController@create');

Route::post('/booking/register', 'FlightController@create');

Route::get('/booking/{hash}', 'FlightController@show');

Route::get('/booking/delete/{hash}', 'FlightController@destroy');

Route::post('/booking/create/', 'FlightController@store');

Route::get('/custom-booking', 'FlightController@custom');

Route::get('/booking/approve/{hash}/181/{poker}', 'FlightController@approve');

//Route::post('/new-feedback', 'WelcomeController@feedback');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

//Route::get('/test/pilots', 'FlightController@test');

Route::get('/poker/TP-{id}', 'PokerController@show');

Route::get('/hand/{cid}/{key}/manage', 'PokerController@index');

Route::post('/hand/{cid}/{key}', 'PokerController@store');

Route::get('/hand/{cid}/deal/181', 'PokerController@deal');

Route::get('/hand/{cid}/remove/181', 'PokerController@delete');