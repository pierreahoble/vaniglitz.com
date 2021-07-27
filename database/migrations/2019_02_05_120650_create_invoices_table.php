<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
           // $table->foreign('user_id')->references('id')->on('users');
            $table->integer('res_id');
           // $table->foreign('reservation_id')->references('id')->on('reservations');
            $table->integer('leasing_id');
           // $table->foreign('leasing_id')->references('id')->on('leasings');
            $table->integer('payment_id');
           // $table->foreign('payment_id')->references('id')->on('payments');
            $table->float('driver_amount');
            $table->float('reduction_amount');
            $table->float('tva_amount');
            $table->float('amount');
            $table->float('ttc_amount');
            $table->float('bail_amount');
            $table->float('total_amount');
            $table->timestamp('date_start')->nullable();
            $table->timestamp('date_back')->nullable();
            $table->string('mode');
            $table->text('receipt')->nullable();
            $table->string('numfac');
            
            $table->text('map')->nullable();
            $table->text('items');
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
        Schema::dropIfExists('invoices');
    }
}
