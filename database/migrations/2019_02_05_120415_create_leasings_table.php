<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeasingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leasings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
          //  $table->foreign('user_id')->references('id')->on('users');
            $table->integer('car_id');
            //$table->foreign('car_id')->references('id')->on('cars');
            $table->integer('driver_id');
            //$table->foreign('driver_id')->references('id')->on('drivers');
            $table->timestamp('date_back');
            $table->float('amount')->nullable();
            $table->float('bail')->nullable();
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
        Schema::dropIfExists('leasings');
    }
}
