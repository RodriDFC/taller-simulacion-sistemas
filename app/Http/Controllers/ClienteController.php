<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\ConstruirHabitacion;
use App\Habitacion;
use App\TablaSimulacion;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /* en este metodo se generan el reporte de demanda insatisfecha
    **/
    public function habitacionesOcupadas(){
        $clientesEconomica=TablaSimulacion::where('tipo_cliente','economica')->get();
        $clientesNegocios=TablaSimulacion::where('tipo_cliente','negocios')->get();
        $clientesEjecutiva=TablaSimulacion::where('tipo_cliente','ejecutiva')->get();
        $clientesPremium=TablaSimulacion::where('tipo_cliente','premium')->get();
        $habitacionesEconomica=Habitacion::where('tipo_habitacion','economica')->value('cantidad_habitaciones');
        $habitacionesNegocios=Habitacion::where('tipo_habitacion','negocios')->value('cantidad_habitaciones');
        $habitacionesEjecutiva=Habitacion::where('tipo_habitacion','ejecutiva')->value('cantidad_habitaciones');
        $habitacionesPremium=Habitacion::where('tipo_habitacion','premium')->value('cantidad_habitaciones');
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
    /* en este metodo se generan el reporte de perdidas porque clientes no hospedados
        **/
    public function clientesNoHospedados()
    {
        $clientesPerdidos = TablaSimulacion::all();

        //Obtener total ganacia y total perdida
        $lastPerdidaTotal = $clientesPerdidos->last()->total_perdida;

        $gananciaEconomica = 0;
        $gananciaNegocios = 0;
        $gananciaEjecutiva = 0;
        $gananciaPremium = 0;

        foreach ($clientesPerdidos as $clientesPerdido => $value) {
            
            if ($value->tipo_cliente == 'economica') {
                $gananciaEconomica = $gananciaEconomica + $value->pago;
            }
            if ($value->tipo_cliente == 'negocios') {
                $gananciaNegocios = $gananciaNegocios + $value->pago;
            }
            if ($value->tipo_cliente == 'ejecutiva') {
                $gananciaEjecutiva = $gananciaEjecutiva + $value->pago;
            }
            if ($value->tipo_cliente == 'premium') {
                $gananciaPremium = $gananciaPremium + $value->pago;
            }
        }

        $lastGananciaTotal = $clientesPerdidos->last()->total_ganancia;
        $gananciasYPerdidas = [$gananciaEconomica, $gananciaNegocios, $gananciaEjecutiva, $gananciaPremium, $lastGananciaTotal, $lastPerdidaTotal];
        
        //Numero de clientes hospedados y no hospedados
        $clientesHospedadosPorServicio;
        //$clientesHospedados = 0;
        $clientesNoHospedados = 0;

        $countEconomico = 0;
        $countEjecutivo = 0;
        $countNegocios = 0;
        $countPremium = 0;
        $tipoHabitaciones;
        
        foreach ($clientesPerdidos as $clientesPerdido => $value) {

            if ($value->hospedado == 1) {

                if ($value->tipo_cliente == 'economica') {
                    $countEconomico++;
                }
                if ($value->tipo_cliente == 'negocios') {
                    $countNegocios++;
                }
                if ($value->tipo_cliente == 'ejecutiva') {
                    $countEjecutivo++;
                }
                if ($value->tipo_cliente == 'premium') {
                    $countPremium++;
                }
                //$clientesHospedados++;
            }else {
                $clientesNoHospedados++;
            }
        }

        $clientesHospedadosPorServicio = [$countEconomico, $countNegocios, $countEjecutivo, $countPremium, $clientesNoHospedados];
        return view('simulacion/graficosPerdidas', compact('clientesHospedadosPorServicio','clientesPerdidos','gananciasYPerdidas'));
    }
}
