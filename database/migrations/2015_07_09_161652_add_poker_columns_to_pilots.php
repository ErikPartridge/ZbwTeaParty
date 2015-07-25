<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPokerColumnsToPilots extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pilots', function(Blueprint $table){
            $table->string('secure_key');
            $table->integer('queued_cards');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pilots', function($table){
            $table->dropColumn('secure_key');
            $table->dropColumn('queued_cards');
        });
    }
}
