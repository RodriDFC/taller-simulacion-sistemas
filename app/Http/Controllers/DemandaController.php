<?php

namespace App\Http\Controllers;

use App\ConstruirHabitacion;
use App\Demanda;
use App\Habitacion;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\TablaSimulacion;

class DemandaController extends Controller
{
    /* en este metodo se generan el reporte de demanda insatisfecha en pdf
    **/
    public function reporteDemandaInsatisfechaPDF()
    {
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
        $pdf=PDF::loadView('cliente/demandaInsatisfechaPDF',compact('clientesEconomica',
            'clientesNegocios','clientesEjecutiva','clientesPremium','demandaInsatisfechaEconomica',
            'demandaInsatisfechaNegocios','demandaInsatisfechaEjecutiva','demandaInsatisfechaPremium'));
        return  $pdf->download('Demanda_insatisfecha_por_falta_de_habitaciones.pdf');
    }
    /* en este metodo se generan el reporte de la tabla de simulacion en pdf
    **/
    public function tablaPDF(){
        $datos=TablaSimulacion::all();
        $pdf=PDF::loadView('simulacion/tablaPdf',compact('datos'));
        return  $pdf->stream();

    }



}
