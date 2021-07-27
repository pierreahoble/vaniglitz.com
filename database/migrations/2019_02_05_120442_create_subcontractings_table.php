<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcontractingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcontractings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('res_id');
           // $table->foreign('reservation_id')->references('id')->on('reservations');
            $table->integer('leasing_id');
            //$table->foreign('leasing_id')->references('id')->on('leasings');
            $table->string('company');
            $table->float('disposal_amount');
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
        Schema::dropIfExists('subcontractings');
    }
}
