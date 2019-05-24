<?php

namespace App\Http\Controllers;

use App\ConstruirHabitacion;
use App\Habitacion;
use App\Servicio;
use App\Simulacion;
use Illuminate\Http\Request;

class HabitacionController extends Controller
{
    public function guardar(Request $request){
        $simulacion=Simulacion::all()->last();
        $simulacion->update([
            'habitaciones_construir'=>$request['habitacion'],
        ]);
        $servicios=Servicio::all()->pluck('id')->toArray();
        $idSim=$simulacion->value('id');
        $simulacion->servicios()->attach($servicios,['simulacion_id'=>$idSim]);
        return view('temporada/definirTemporada');
    }
    public function construir(){
        $construirEconomica=0;
        $construirNegocios=0;
        $construirEjecutiva=0;
        $construirPremium=0;
        $simulacion=Simulacion::all()->last();
        $habitacion=$simulacion->habitaciones_construir;
        $economica=Habitacion::where('tipo_habitacion','economica')->value('cantidad_habitaciones');
        $negocios=Habitacion::where('tipo_habitacion','negocios')->value('cantidad_habitaciones');
        $ejecutiva=Habitacion::where('tipo_habitacion','ejecutiva')->value('cantidad_habitaciones');
        $premium=Habitacion::where('tipo_habitacion','premium')->value('cantidad_habitaciones');
        $demandaEconomica=$simulacion->clientes_simulados_economica;
        $demandaNegocios=$simulacion->clientes_simulados_negocios;
        $demandaEjecutiva=$simulacion->clientes_simulados_ejecutiva;
        $demandaPremium=$simulacion->clientes_simulados_premium;
        $ec=$economica/$demandaEconomica;
        $ne=$negocios/$demandaNegocios;
        $ej=$ejecutiva/$demandaEjecutiva;
        $pr=$premium/$demandaPremium;
        if($ec<=1.12 || $ne<=1.2 || $ej<=1.2 || $pr<=1.2){
            while ($habitacion!=0){
                if($economica/$demandaEconomica<=1.12){
                    $construirEconomica++;
                    $economica++;
                    $habitacion--;
                }elseif($premium/$demandaPremium<=1.2){
                    $construirPremium++;
                    $premium++;
                    $habitacion--;
                }elseif($negocios/$demandaNegocios<=1.2){
                    $construirNegocios++;
                    $negocios++;
                    $habitacion--;
                }elseif($ejecutiva/$demandaEjecutiva<=1.2){
                    $construirEjecutiva++;
                    $ejecutiva++;
                    $habitacion--;
                }else{
                    $habitacion--;
                }
            }
            ConstruirHabitacion::create([
                'cantidad_habitaciones_economica'=>$construirEconomica,
                'cantidad_habitaciones_negocios'=>$construirNegocios,
                'cantidad_habitaciones_ejecutiva'=>$construirEjecutiva,
                'cantidad_habitaciones_premium'=>$construirPremium,
                'simulacion_id'=>$simulacion->id
            ]);
            return redirect()->route('datosSimulacion');
        }else{
            return redirect()->route('datosSimulacion');
        }
    }

}
