<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
          //  $table->foreign('user_id')->references('id')->on('users');
            $table->integer('leasing_id');
          //  $table->foreign('leasing_id')->references('id')->on('leasings');
            $table->integer('res_id');
           // $table->foreign('reservation_id')->references('id')->on('reservations');
            $table->integer('sub_id');
          //  $table->foreign('subcontracting_id')->references('id')->on('subcontractings');
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
        Schema::dropIfExists('payments');
    }
}
