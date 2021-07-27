<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('cartype_id');
            //$table->foreign('cartype_id')->references('id')->on('cartypes');
            $table->integer('carmodel_id');
           // $table->foreign('carmodel_id')->references('id')->on('carmodels');
            $table->integer('carstate_id');
           // $table->foreign('carstate_id')->references('id')->on('carstates');
            $table->integer('category_id');
          //  $table->foreign('category_id')->references('id')->on('categorys');
            $table->string('color')->nullable();
            $table->string('registration')->nullable();
            $table->boolean('available')->nullable();
            $table->boolean('active')->nullable();
            $table->float('amount')->nullable();
            $table->text('description')->nullable();
            $table->integer('place')->nullable();
            $table->integer('baggage')->nullable();
            $table->integer('door')->nullable();
            $table->float('kilometrage');
            $table->string('fuel')->nullable();
            $table->integer('gasoline');
            $table->text('damage')->nullable();
            $table->float('amount_hour')->nullable();
            $table->string('year')->nullable();
            $table->float('lome_accra')->nullable();
            $table->float('lome_cotonou')->nullable();
            $table->float('bail')->nullable();
            $table->integer('quantity');
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
        Schema::dropIfExists('cars');
    }
}
