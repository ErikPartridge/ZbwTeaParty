<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPokerColumnsToFlights extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('flights', function($table){
            $table->boolean('takenoff');
            $table->boolean('landed');
            $table->boolean('notified');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('flights', function($table){
            $table->boolean('takenoff');
            $table->boolean('landed');
            $table->boolean('notified');
        });
    }
}
