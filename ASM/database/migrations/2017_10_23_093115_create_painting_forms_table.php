<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaintingFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('painting_forms', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('painting_name');
            $table->string('stored_file_name');
            $table->string('painting_type');
            $table->text('description');
            $table->integer('seller_id')->unsigned();
            $table->string('seller_name');
            $table->string('sell_method');
            $table->integer('base_price');
            $table->dateTime('start_date')->nullable();
            $table->integer('auction_days')->nullable();
            $table->integer('buyer_id')->unsigned();
            $table->string('buyer_name');
            $table->integer('high_bid')->nullable();
            $table->dateTime('high_bid_date')->nullable();
            $table->integer('sold_flag');
            $table->timestamps();
        });

        Schema::table('painting_forms', function($table) {
            $table->foreign('seller_id')->references('id')->on('users');
            $table->foreign('buyer_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('painting_forms');
    }
}
