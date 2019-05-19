<?php

namespace App\Http\Controllers;

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

}
