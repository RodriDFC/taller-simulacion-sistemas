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
    /* en este metodo se guardan los datos lapso de tiempo, habitaciones a construir
        y cantidad de tiempo y retorna a la vista donde se selecciona la temporada    **/
    public function guardar(Request $request){
        $simulacion=Simulacion::all()->last();
        $simulacion->update([
            'habitaciones_construir'=>$request['habitacion'],
            'lapso_simulacion'=>$request['lapso_simulacion'],
            'cantidad_tiempo'=>$request['cantidad_tiempo']
        ]);
        $servicios=Servicio::all()->pluck('id')->toArray();
        $idSim=$simulacion->value('id');
        $simulacion->servicios()->attach($servicios,['simulacion_id'=>$idSim]);
        return view('temporada/definirTemporada');
    }
    /* en este metodo se construyen la habitaciones comparando los clientes simulados
     con el numero de habitaciones disponibles, priorizando a los clientes que generan mas ganancias
        (premium, ejecutiva, negocios,economica)
     y  redircciona al metodo que muestra la tabla de la simulacion
     **/
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
        $ec=$economica-$demandaEconomica;
        $ne=$negocios-$demandaNegocios;
        $ej=$ejecutiva-$demandaEjecutiva;
        $pr=$premium-$demandaPremium;
        if($ec<0 || $ne<0 || $ej<0 || $pr<0){
            while ($habitacion!=0){
                if($premium-$demandaPremium < 0){
                    $construirPremium++;
                    $premium++;
                    $habitacion--;
                }elseif($ejecutiva-$demandaEjecutiva < 0){
                    $construirEjecutiva++;
                    $ejecutiva++;
                    $habitacion--;
                }elseif($negocios-$demandaNegocios < 0){
                    $construirNegocios++;
                    $negocios++;
                    $habitacion--;
                }elseif($economica-$demandaEconomica < 0){
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
            ConstruirHabitacion::create([
                'cantidad_habitaciones_economica'=>$construirEconomica,
                'cantidad_habitaciones_negocios'=>$construirNegocios,
                'cantidad_habitaciones_ejecutiva'=>$construirEjecutiva,
                'cantidad_habitaciones_premium'=>$construirPremium,
                'simulacion_id'=>$simulacion->id
            ]);
            return redirect()->route('datosSimulacion');
        }
    }
    /* en este metodo se genera la lista de habitaciones del hotel
     **/
    public function habitaciones(){
        $habitaciones=Habitacion::all();
        return view('habitacion/habitaciones',compact('habitaciones'));
    }
    /* en este metodo se genera la vista para editar las habitaciones del hotel
     **/
    public function editarHabitacion(Habitacion $habitacion){
        return view('habitacion/editarHabitaciones',compact('habitacion'));
    }
    /* en este metodo se actualiza la habitacion a editar
     **/
    public function actualizarHabitacion(Request $request,Habitacion $habitacion){
        $this->validate($request,[
            'cantidad_habitaciones'=>['required','numeric'],
            'tipo_habitacion'=>'',
            'precio_habitacion'=> ['required','digits_between:1,1000']
        ],[
            'cantidad_habitaciones.required'=>'el campo "cantidad habitaciones" es requerido',
            'cantidad_habitaciones.numeric'=>'el campo "cantidad habitaciones" debe ser un numero',
            'precio_habitacion.digits_between'=>'el campo "precio habitacion" debe estar entre 1 y 1000'
        ]);
        $habitacion->update($request->all());
        return redirect()->route('habitaciones');
    }
}
