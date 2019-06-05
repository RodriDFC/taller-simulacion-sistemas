<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSimulacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simulacions', function (Blueprint $table) {
            $table->increments('id');
            $table->String('temporada')->nullable();
            $table->integer('habitaciones_construir')->nullable();
            $table->float('lapso_simulacion')->nullable();
            $table->integer('clientes_simulados_economica')->nullable();
            $table->integer('clientes_simulados_negocios')->nullable();
            $table->integer('clientes_simulados_ejecutiva')->nullable();
            $table->integer('clientes_simulados_premium')->nullable();
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
        Schema::dropIfExists('simulacions');
    }
}
