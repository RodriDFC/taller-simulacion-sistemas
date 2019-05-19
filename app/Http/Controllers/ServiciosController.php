<?php

namespace App\Http\Controllers;

use App\Servicio;
use App\Simulacion;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{
    public function definirServicios(Request $request){
        //dd($request->all());
        request()->validate([
            'serviciosCliente'=>'required',
        ]);
        $simulacion=Simulacion::all()->last();
        $idSim=$simulacion->value('id');
        $simulacion->servicios()->attach($request['serviciosCliente'],['simulacion_id'=>$idSim]);
        return view('temporada/definirTemporada');
    }
}
