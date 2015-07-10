<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function($table){
            $table->increments('id');
            $table->string('type');
            $table->integer('pilot_id')->unsigned();
            $table->integer('deck_id')->unsigned();
            $table->foreign('pilot_id')->references('id')->on('pilots');
            $table->foreign('deck_id')->references('id')->on('decks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('card');
    }
}
