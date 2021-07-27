<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoutiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boutiques', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom', 100)->nullable()->default('text');
            $table->string('email', 100)->unique();
            $table->string('numero', 100)->nullable()->default('text');
            $table->string('adresse', 100)->nullable()->default('text');
            $table->string('heure', 100)->nullable()->default('text');
            $table->string('logo', 100)->nullable()->default('text');
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
        Schema::dropIfExists('boutiques');
    }
}
