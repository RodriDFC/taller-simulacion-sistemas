<?php

namespace App\Http\Controllers;

use App\ConstruirHabitacion;
use App\Habitacion;
use App\Servicio;
use App\Simulacion;
use Illuminate\Http\Request;
use App\TablaSimulacion;

class HabitacionController extends Controller
{
    public function guardar(Request $request){
        $simulacion=Simulacion::all()->last();
        $simulacion->update([
            'habitaciones_construir'=>$request['habitacion'],
            'lapso_simulacion'=>$request['lapso_simulacion']
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
        $datos=TablaSimulacion::all();
        $habitacion=$simulacion->habitaciones_construir;
        $economica=Habitacion::where('tipo_habitacion','economica')->value('cantidad_habitaciones');
        $negocios=Habitacion::where('tipo_habitacion','negocios')->value('cantidad_habitaciones');
        $ejecutiva=Habitacion::where('tipo_habitacion','ejecutiva')->value('cantidad_habitaciones');
        $premium=Habitacion::where('tipo_habitacion','premium')->value('cantidad_habitaciones');
        $demandaEconomica=$datos->where('tipo_cliente','economica')->count();
        $demandaNegocios=$datos->where('tipo_cliente','negocios')->count();;
        $demandaEjecutiva=$datos->where('tipo_cliente','ejecutiva')->count();;
        $demandaPremium=$datos->where('tipo_cliente','premium')->count();;
        $ec=$economica/$demandaEconomica;
        $ne=$negocios/$demandaNegocios;
        $ej=$ejecutiva/$demandaEjecutiva;
        $pr=$premium/$demandaPremium;
        if($ec<=1 || $ne<=1 || $ej<=1 || $pr<=1){
            while ($habitacion!=0){
                if($premium/$demandaPremium <= 1){
                    $construirPremium++;
                    $premium++;
                    $habitacion--;
                }elseif($ejecutiva/$demandaEjecutiva <= 1){
                    $construirEjecutiva++;
                    $ejecutiva++;
                    $habitacion--;
                }elseif($negocios/$demandaNegocios <= 1){
                    $construirNegocios++;
                    $negocios++;
                    $habitacion--;
                }elseif($economica/$demandaEconomica <= 1){
                    $construirEconomica++;
                    $economica++;
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
    public function habitaciones(){
        $habitaciones=Habitacion::all();
        return view('habitacion/habitaciones',compact('habitaciones'));
    }
    public function editarHabitacion(Habitacion $habitacion){
        return view('habitacion/editarHabitaciones',compact('habitacion'));
    }
    public function actualizarHabitacion(Request $request,Habitacion $habitacion){
        $this->validate($request,[
            'cantidad_habitaciones'=>['required','numeric'],
            'tipo_habitacion'=>'',
        ],[
            'cantidad_habitaciones.required'=>'el campo "cantidad habitaciones" es requerido',
            'cantidad_habitaciones.numeric'=>'el campo "cantidad habitaciones" debe ser un numero'
        ]);
        $habitacion->update($request->all());
        return redirect()->route('habitaciones');
    }
}
