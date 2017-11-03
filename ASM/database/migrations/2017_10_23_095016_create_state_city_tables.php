<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStateCityTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demo_state', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        Schema::create('demo_cities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('state_id');
            $table->string('name');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('demo_cities');
        Schema::drop('demo_state');
    }
}
