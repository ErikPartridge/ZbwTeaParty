<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('flights', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('callsign');
			$table->time('departure');
			$table->time('arrival');
			$table->string('departs', 4);
			$table->string('arrives', 4);
			$table->string('route');
			$table->string('aircraft_type');
			$table->boolean('booked');
			$table->integer('pilot_id')->unsigned();
			$table->foreign('pilot_id')->references('id')->on('users');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('flights');
	}

}
