<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Array_;

class Cliente extends Model
{
    protected $fillable = [
        'numero_cliente','hospedado','simulacion_id','id','tipo_cliente','pago'
    ];
    public function servicio(){
        return $this->belongsToMany(Servicio::class);
    }
    public static function simularClientes(int $i){
        $simulacion=Simulacion::all()->last();
        $servicios=Servicio::where('exigencia','economica')->pluck('id')->toArray();
        $cantidadServicios=count($servicios);
        $ser=$servicios;
        //for ($i=1;$i<=$clientesEconomica;$i++){
            $aleatorio=(rand(0,100))/100;
            if($aleatorio<=0.8){
                $hospedado=true;
            }else{
                $hospedado=false;
            }
            $aleatorio1=rand(1,$cantidadServicios);
            $j=0;
            $servicios=array();
            while ($j<=$aleatorio1){
                $aleatorio2=rand(0,$cantidadServicios-1);
                $servicio=$ser[$aleatorio2];
                $servicios=array_add($servicios,$j,$servicio);
                $j++;
            }
            $servicios=array_unique($servicios);
            $pagoHabitacionEconomica=Habitacion::where('tipo_habitacion','economica')->value('precio_habitacion');
            $clienteSim=Cliente::create([
                'id'=>$i,
                'numero_cliente'=>$i,
                'hospedado'=>$hospedado,
                'tipo_cliente'=>'economica',
                'pago'=>$pagoHabitacionEconomica,
                'simulacion_id'=>$simulacion->id
            ]);
            $idSim=$clienteSim->id;
            $clienteSim->servicio()->attach($servicios,['cliente_id'=>$idSim]);
            $servicios=$ser;
        //}
    }
    public static function simularClientesNegocios(int $i){
        $simulacion=Simulacion::all()->last();
        $servicios=Servicio::where('exigencia','economica')
            ->orWhere('exigencia','negocios')
            ->pluck('id')->toArray();
        $cantidadServicios=count($servicios);
        $ser=$servicios;
        //for ($i=1;$i<=$clientesEconomica;$i++){
        $aleatorio=(rand(0,100))/100;
        if($aleatorio<=0.85){
            $hospedado=true;
        }else{
            $hospedado=false;
        }
        $aleatorio1=rand(1,$cantidadServicios);
        $j=0;
        $servicios=array();
        while ($j<=$aleatorio1){
            $aleatorio2=rand(0,$cantidadServicios-1);
            $servicio=$ser[$aleatorio2];
            $servicios=array_add($servicios,$j,$servicio);
            $j++;
        }
        $servicios=array_unique($servicios);
        $pagoHabitacionNegocios=Habitacion::where('tipo_habitacion','negocios')->value('precio_habitacion');
        $clienteSim=Cliente::create([
            'id'=>$i,
            'numero_cliente'=>$i,
            'hospedado'=>$hospedado,
            'tipo_cliente'=>'negocios',
            'pago'=>$pagoHabitacionNegocios,
            'simulacion_id'=>$simulacion->id
        ]);
        $idSim=$clienteSim->id;
        $clienteSim->servicio()->attach($servicios,['cliente_id'=>$idSim]);
        $servicios=$ser;
        //}
    }

    public static function simularClientesEjecutiva(int $i){
        $simulacion=Simulacion::all()->last();
        $servicios=Servicio::where('exigencia','economica')
            ->orWhere('exigencia','negocios')
            ->orWhere('exigencia','ejecutiva')
            ->pluck('id')->toArray();
        $cantidadServicios=count($servicios);
        $ser=$servicios;
        //for ($i=1;$i<=$clientesEconomica;$i++){
        $aleatorio=(rand(0,100))/100;
        if($aleatorio<=0.85){
            $hospedado=true;
        }else{
            $hospedado=false;
        }
        $aleatorio1=rand(1,$cantidadServicios);
        $j=0;
        $servicios=array();
        while ($j<=$aleatorio1){
            $aleatorio2=rand(0,$cantidadServicios-1);
            $servicio=$ser[$aleatorio2];
            $servicios=array_add($servicios,$j,$servicio);
            $j++;
        }
        $servicios=array_unique($servicios);
        $pagoHabitacion=Habitacion::where('tipo_habitacion','ejecutiva')->value('precio_habitacion');
        $clienteSim=Cliente::create([
            'id'=>$i,
            'numero_cliente'=>$i,
            'hospedado'=>$hospedado,
            'tipo_cliente'=>'ejecutiva',
            'pago'=>$pagoHabitacion,
            'simulacion_id'=>$simulacion->id
        ]);
        $idSim=$clienteSim->id;
        $clienteSim->servicio()->attach($servicios,['cliente_id'=>$idSim]);
        $servicios=$ser;
        //}
    }

    public static function simularClientesPremium(int $i){
        $simulacion=Simulacion::all()->last();
        $servicios=Servicio::where('exigencia','economica')
            ->orWhere('exigencia','negocios')
            ->orWhere('exigencia','ejecutiva')
            ->orWhere('exigencia','premium')
            ->pluck('id')->toArray();
        $cantidadServicios=count($servicios);
        $ser=$servicios;
        //for ($i=1;$i<=$clientesEconomica;$i++){
        $aleatorio=(rand(0,100))/100;
        if($aleatorio<=0.9){
            $hospedado=true;
        }else{
            $hospedado=false;
        }
        $aleatorio1=rand(1,$cantidadServicios);
        $j=0;
        $servicios=array();
        while ($j<=$aleatorio1){
            $aleatorio2=rand(0,$cantidadServicios-1);
            $servicio=$ser[$aleatorio2];
            $servicios=array_add($servicios,$j,$servicio);
            $j++;
        }
        $servicios=array_unique($servicios);
        $pagoHabitacion=Habitacion::where('tipo_habitacion','premium')->value('precio_habitacion');
        $clienteSim=Cliente::create([
            'id'=>$i,
            'numero_cliente'=>$i,
            'hospedado'=>$hospedado,
            'tipo_cliente'=>'premium',
            'pago'=>$pagoHabitacion,
            'simulacion_id'=>$simulacion->id
        ]);
        $idSim=$clienteSim->id;
        $clienteSim->servicio()->attach($servicios,['cliente_id'=>$idSim]);
        $servicios=$ser;
        //}
    }
}
