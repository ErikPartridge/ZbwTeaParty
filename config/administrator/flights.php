<?php

return array(

	'title'  => 'Flights',

	'single' => 'flight',

	'model'  => 'App\Flight',

	'form_width' => 550,

	'columns'=> array(

		'callsign' => array(
			'title' => 'Callsign'
		),
		'departure' => array(
			'title' => 'Departure Time',
			'type'  => 'time',
			'time_format' => 'HH:mm'
		),
		'arrival'   => array(
			'title' => 'Arrival Time',
			'type'  => 'time',
			'time_format' => 'HH:mm'
		),
		'departs'   => array(
			'title' => 'Departure Airport'
		),
		'arrives'   => array(
			'title' => 'Arrival Airport'
		),
		'aircraft_type' => array(
			'title' => 'Aircraft Type'
		),
		'booked'    => array(
			'title' => 'Is Booked',
			'display' => function($value){
				if($value){
					return 'yes';
				}else{
					return 'no';
				}
			}
		),
		'poker'     => array(
			'title'  => 'Poker Qualifying',
			'display' => function($value){
				if($value){
					return 'yes';
				}else{
					return 'no';
				}
			}
		)
		/*'pilot_cid' => array(
			'title' => 'Pilot CID',
			'relationship' => 'user',
			'select' => '(:table).cid'
		)*/

	),

	'edit_fields' => array(
		'callsign' => array(
			'title' => 'Callsign',
			'type'  => 'text'
		),
		'departure' => array(
			'title' => 'Departure Time',
			'type'  => 'time',
			'time_format' => 'HH:mm'
		),
		'arrival' => array(
			'title' => 'Arrival Time',
			'type'  => 'time',
			'time_format' => 'HH:mm'
		),
		'departs' => array(
			'title' => 'Departure Airport',
			'type'  => 'text'
		),
		'arrives' => array(
			'title' => 'Arrival Airport',
			'type'  => 'text'
		),
		'aircraft_type' => array(
			'title' => 'Aircraft Type',
			'type'  => 'text'
		),
		'poker'   => array(
			'title'  => 'Qualifies for Poker',
			'type'  => 'bool'
		)
	),
	'sort' => array(
		'field' => 'departure',
		'direction' => 'asc'
	),
	'rules' => array(
		'callsign' => 'required|max:10',
		'departure' => 'required',
		'arrival'  => 'required',
		'arrives'  => 'required|max:4',
		'departs'  => 'required|max:4',
		'aircraft_type' => 'required'
	)

);