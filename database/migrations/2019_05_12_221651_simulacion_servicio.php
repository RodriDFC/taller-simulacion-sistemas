<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SimulacionServicio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicio_simulacion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('simulacion_id')->unsigned()->index();
            $table->foreign('simulacion_id')->references('id')->on('simulacions')->onDelete('cascade');
            $table->integer('servicio_id')->unsigned()->index();
            $table->foreign('servicio_id')->references('id')->on('servicios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
