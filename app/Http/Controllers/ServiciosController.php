<?php

namespace App\Http\Controllers;

use App\Servicio;
use App\Simulacion;
use App\TablaSimulacion;
use Barryvdh\DomPDF\Facade as PDF;
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
    /* en este metodo se genera la lista de servicios del hotel
     **/
    public function servicios(){
        $servicios=Servicio::all();
        return view('servicio/servicios',compact('servicios'));
    }
    /* en este metodo se genera el formulario para crear un servicio del hotel
     **/
    public function crearServicios(){
        return view('servicio/crearServicio');
    }
    /* en este metodo se guarda el nuevo servicio del hotel
    **/
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
    /* en este metodo se genera el formulario para editar un servicio del hotel
    **/
    public function editarServicios(Servicio $servicio){
        return view('servicio/editarServicios',compact('servicio'));
    }
    /* en este metodo se actualiza el servicio seleccionado
    **/
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
    /* en este metodo se elimina un servicio del hotel
    **/
    public function eliminarServicio(Servicio $servicio){
        $servicio->delete();
        return redirect()->route('servicios');
    }
    /* en este metodo se genera el reporte de las ganancias de los servicios del hotel
    **/
    public function reporteServicios(){
        $datos=TablaSimulacion::all();
        $serv = Servicio::all();
        $servicios=[];
        $gananciaServicio=0;
        $indice = 0;
        foreach ($serv as $ser) {
            $count = 0;
            foreach ($datos as $dato) {
                if (strpos($dato->servicios,$ser->servicio) !== false ) {
                    $count++;
                }
            }
            $gananciaServicio=$count*$ser->costo;
            $servicios[$indice] = [$ser->servicio,$count,$ser->costo,$gananciaServicio];
            $indice++;
        }
        return view('servicio/reporteServicio',compact('servicios'));
    }
    /* en este metodo se genera el reporte de las ganancias de los servicios del hotel en pdf
    **/
    public function reporteServiciosPDF(){
        $datos=TablaSimulacion::all();
        $serv = Servicio::all();
        $servicios=[];
        $gananciaServicio=0;
        $indice = 0;
        foreach ($serv as $ser) {
            $count = 0;
            foreach ($datos as $dato) {
                if (strpos($dato->servicios,$ser->servicio) !== false ) {
                    $count++;
                }
            }
            $gananciaServicio=$count*$ser->costo;
            $servicios[$indice] = [$ser->servicio,$count,$ser->costo,$gananciaServicio];
            $indice++;
        }
        $pdf=PDF::loadView('servicio/reporteServicioPdf',compact('servicios'));
        return  $pdf->stream();
    }
}
