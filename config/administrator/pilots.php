<?php

return array(

	'title'  => 'Pilots',

	'single' => 'pilot',

	'model'  => 'App\Pilot',

	'columns'=> array(

		'first' => array(
			'title' => 'First Name'
		),
		'last' => array(
			'title' => 'Last Name'
		),
		'cid'   => array(
			'title' => 'CID'
		),
		'email'   => array(
			'title' => 'Email'
		)

	),

	'edit_fields' => array(
		'first' => array(
			'title' => 'First Name',
			'type'  => 'text'
		),
		'last' => array(
			'title' => 'Last Name',
			'type'  => 'text'
		),
		'cid'   => array(
			'title' => 'CID',
			'type'  => 'text'
		),
		'email'   => array(
			'title' => 'Email',
			'type'  => 'text'
		)
	),
	'action_permissions' => array(
		'create' => function($model){
			return false;
		},
		'update' => function($model){
			return false;
		}
	),
	'sort' => array(
		'field' => 'cid',
		'direction' => 'asc'
	)
);