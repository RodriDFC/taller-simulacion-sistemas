<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\ConstruirHabitacion;
use App\Habitacion;
use App\TablaSimulacion;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function habitacionesOcupadas(){
        $clientesEconomica=TablaSimulacion::where('tipo_cliente','economica')->get();
        $clientesNegocios=TablaSimulacion::where('tipo_cliente','negocios')->get();
        $clientesEjecutiva=TablaSimulacion::where('tipo_cliente','ejecutiva')->get();
        $clientesPremium=TablaSimulacion::where('tipo_cliente','premium')->get();
        $habitacionesEconomica=Habitacion::where('tipo_habitacion','economica')->first()->value('cantidad_habitaciones');
        $habitacionesNegocios=Habitacion::where('tipo_habitacion','negocios')->first()->value('cantidad_habitaciones');
        $habitacionesEjecutiva=Habitacion::where('tipo_habitacion','ejecutiva')->first()->value('cantidad_habitaciones');
        $habitacionesPremium=Habitacion::where('tipo_habitacion','premium')->first()->value('cantidad_habitaciones');
        $habitacionesConstruidas=ConstruirHabitacion::all()->first();
        $habitacionesEconomicaConstruidas=$habitacionesConstruidas->cantidad_habitaciones_economica;
        $habitacionesNegociosConstruidas=$habitacionesConstruidas->cantidad_habitaciones_negocios;
        $habitacionesEjecutivaConstruidas=$habitacionesConstruidas->cantidad_habitaciones_ejecutiva;
        $habitacionesPremiumConstruidas=$habitacionesConstruidas->cantidad_habitaciones_premium;
        $habitacionesEconomicaTotal=$habitacionesEconomica+$habitacionesEconomicaConstruidas;
        $habitacionesNegociosTotal=$habitacionesNegocios+$habitacionesNegociosConstruidas;
        $habitacionesEjecutivaTotal=$habitacionesEjecutiva+$habitacionesEjecutivaConstruidas;
        $habitacionesPremiumTotal=$habitacionesPremium+$habitacionesPremiumConstruidas;
        $demandaInsatisfechaEconomica=$clientesEconomica->count()-$habitacionesEconomicaTotal;
        $demandaInsatisfechaNegocios=$clientesNegocios->count()-$habitacionesNegociosTotal;
        $demandaInsatisfechaEjecutiva=$clientesEjecutiva->count()-$habitacionesEjecutivaTotal;
        $demandaInsatisfechaPremium=$clientesPremium->count()-$habitacionesPremiumTotal;
        if ($demandaInsatisfechaEconomica >0){
            $clientesEconomica=$clientesEconomica->splice($habitacionesEconomicaTotal-1)->where('hospedado',true);
        }
        if ($demandaInsatisfechaNegocios >0){
            $clientesNegocios=$clientesNegocios->splice($habitacionesNegociosTotal-1)->where('hospedado',true);
        }
        if ($demandaInsatisfechaEjecutiva >0){
            $clientesEjecutiva=$clientesEjecutiva->splice($habitacionesEjecutivaTotal-1)->where('hospedado',true);
        }
        if ($demandaInsatisfechaPremium >0){
            $clientesPremium=$clientesPremium->splice($habitacionesPremiumTotal-1)->where('hospedado',true);
        }
        return view('cliente/demandaInsatisfecha',compact('clientesEconomica',
            'clientesNegocios','clientesEjecutiva','clientesPremium','demandaInsatisfechaEconomica',
            'demandaInsatisfechaNegocios','demandaInsatisfechaEjecutiva','demandaInsatisfechaPremium'));
    }

    public function clientesNoHospedados()
    {
        $clientesPerdidos = TablaSimulacion::all();

        //Obtener total ganacia y total perdida
        $lastPerdidaTotal = $clientesPerdidos->last()->total_perdida;
        $lastGananciaTotal = $clientesPerdidos->last()->total_ganancia;
        $gananciaPerdida = [$lastGananciaTotal, $lastPerdidaTotal];
        
        //Numero de clientes hospedados y no hospedados
        $hospedadosYnoHospedados;
        $clientesHospedados = 0;
        $clientesNoHospedados = 0;
        
        foreach ($clientesPerdidos as $clientesPerdido => $value) {
            if ($value->hospedado == 1) {
                $clientesHospedados++;
            }else {
                $clientesNoHospedados++;
            }
        }

        $hospedadosYnoHospedados = [$clientesHospedados, $clientesNoHospedados];
        return view('simulacion/graficosPerdidas', compact('clientesPerdidos','hospedadosYnoHospedados', 'gananciaPerdida'));
    }
}
