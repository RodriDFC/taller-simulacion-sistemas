<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaSimulacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabla_simulacion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero_cliente')->nullable();
            $table->string('tipo_cliente')->nullable();
            $table->string('servicios')->nullable();
            $table->boolean('hospedado')->nullable();
            $table->integer('pago')->nullable();
            $table->integer('total_ganancia')->nullable();
            $table->integer('simulacion_id')->unsigned()->index();
            $table->foreign('simulacion_id')->references('id')->on('simulacions')->onDelete('cascade');
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
