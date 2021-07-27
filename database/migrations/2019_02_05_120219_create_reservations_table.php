<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            //$table->foreign('user_id')->references('id')->on('users');
            $table->integer('car_id');
            //$table->foreign('car_id')->references('id')->on('cars');
            $table->integer('driver_id');
           // $table->foreign('driver_id')->references('id')->on('drivers');
            $table->timestamp('date_start')->nullable();
            $table->timestamp('date_back')->nullable();
            $table->float('discount')->nullable();
            $table->string('express')->nullable();
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
        Schema::dropIfExists('reservations');
    }
}
