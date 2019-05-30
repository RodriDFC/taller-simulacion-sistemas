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
    public function servicios(){
        $servicios=Servicio::all();
        return view('servicio/servicios',compact('servicios'));
    }
    public function crearServicios(){
        return view('servicio/crearServicio');
    }
    public function guardarServicios(Request $request){
        $this->validate($request,[
            'servicio'=>['required'],
            'costo'=>['required','numeric'],
            'exigencia'=>''
        ],[
           'servicio.required'=>'el campo servicio es requerido',
           'costo.required'=>'el campo costo es requerido',
           'costo.numeric'=>'el campo costo debe ser un numero'
        ]);
        Servicio::create([
            'servicio'=>$request['servicio'],
            'costo'=>$request['costo'],
            'exigencia'=>$request['exigencia']
        ]);
        return redirect()->route('servicios');
    }
    public function editarServicios(Servicio $servicio){
        return view('servicio/editarServicios',compact('servicio'));
    }
    public function actualizarServicios(Request $request,Servicio $servicio){
        $this->validate($request,[
            'servicio'=>['required'],
            'costo'=>['required','numeric'],
            'exigencia'=>''
        ],[
            'servicio.required'=>'el campo servicio es requerido',
            'costo.required'=>'el campo costo es requerido',
            'costo.numeric'=>'el campo costo debe ser un numero'
        ]);
        $servicio->update($request->all());
        return redirect()->route('servicios');
    }
    public function eliminarServicio(Servicio $servicio){
        $servicio->delete();
        return redirect()->route('servicios');
    }
}
