<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommencerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commencer', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('dateFin')->nullable();
            $table->integer('membre_id')->unsigned();
            $table->integer('quete_id')->unsigned();

            $table->foreign('membre_id')->references('id')->on('membres');
            $table->foreign('quete_id')->references('id')->on('quetes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commencer');
    }
}
