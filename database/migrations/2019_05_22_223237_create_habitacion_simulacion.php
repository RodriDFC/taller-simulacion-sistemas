<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHabitacionSimulacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('construir_habitacion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad_habitaciones_economica')->nullable();
            $table->integer('cantidad_habitaciones_negocios')->nullable();
            $table->integer('cantidad_habitaciones_ejecutiva')->nullable();
            $table->integer('cantidad_habitaciones_premium')->nullable();
            $table->integer('simulacion_id')->unsigned()->index();
            $table->foreign('simulacion_id')->references('id')->on('simulacions')->onDelete('cascade');
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
        //
    }
}
