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
        $servicios=Servicio::where('servicio','WiFi')
            ->orWhere('servicio','TV-cable')
            ->orWhere('servicio','limpieza diaria')
            ->pluck('id')->toArray();
        $ser=$servicios;
        //for ($i=1;$i<=$clientesEconomica;$i++){
            $aleatorio=(rand(0,100))/100;
            if($aleatorio<=0.8){
                $hospedado=true;
            }else{
                $hospedado=false;
            }
            $aleatorio1=rand(1,3);
            $j=0;
            $servicios=array();
            while ($j<=$aleatorio1){
                $aleatorio2=rand(0,2);
                $servicio=$ser[$aleatorio2];
                $servicios=array_add($servicios,$j,$servicio);
                $j++;
            }
            $servicios=array_unique($servicios);
            $clienteSim=Cliente::create([
                'id'=>$i,
                'numero_cliente'=>$i,
                'hospedado'=>$hospedado,
                'tipo_cliente'=>'economica',
                'pago'=>78,
                'simulacion_id'=>$simulacion->id
            ]);
            $idSim=$clienteSim->id;
            $clienteSim->servicio()->attach($servicios,['cliente_id'=>$idSim]);
            $servicios=$ser;
        //}
    }
    public static function simularClientesNegocios(int $i){
        $simulacion=Simulacion::all()->last();
        $servicios=Servicio::where('servicio','WiFi')
            ->orWhere('servicio','TV-cable')
            ->orWhere('servicio','limpieza diaria')
            ->orWhere('servicio','Baño privado')
            ->orWhere('servicio','Sala Conferencias')
            ->pluck('id')->toArray();
        $ser=$servicios;
        //for ($i=1;$i<=$clientesEconomica;$i++){
        $aleatorio=(rand(0,100))/100;
        if($aleatorio<=0.85){
            $hospedado=true;
        }else{
            $hospedado=false;
        }
        $aleatorio1=rand(1,5);
        $j=0;
        $servicios=array();
        while ($j<=$aleatorio1){
            $aleatorio2=rand(0,4);
            $servicio=$ser[$aleatorio2];
            $servicios=array_add($servicios,$j,$servicio);
            $j++;
        }
        $servicios=array_unique($servicios);
        $clienteSim=Cliente::create([
            'id'=>$i,
            'numero_cliente'=>$i,
            'hospedado'=>$hospedado,
            'tipo_cliente'=>'negocios',
            'pago'=>97,
            'simulacion_id'=>$simulacion->id
        ]);
        $idSim=$clienteSim->id;
        $clienteSim->servicio()->attach($servicios,['cliente_id'=>$idSim]);
        $servicios=$ser;
        //}
    }

    public static function simularClientesEjecutiva(int $i){
        $simulacion=Simulacion::all()->last();
        $servicios=Servicio::where('servicio','WiFi')
            ->orWhere('servicio','TV-cable')
            ->orWhere('servicio','limpieza diaria')
            ->orWhere('servicio','Baño privado')
            ->orWhere('servicio','Sala Conferencias')
            ->orWhere('servicio','Centro de negocios')
            ->orWhere('servicio','Restaurant y Bar')
            ->orWhere('servicio','Atencion Personalizada')
            ->pluck('id')->toArray();
        $ser=$servicios;
        //for ($i=1;$i<=$clientesEconomica;$i++){
        $aleatorio=(rand(0,100))/100;
        if($aleatorio<=0.85){
            $hospedado=true;
        }else{
            $hospedado=false;
        }
        $aleatorio1=rand(1,8);
        $j=0;
        $servicios=array();
        while ($j<=$aleatorio1){
            $aleatorio2=rand(0,7);
            $servicio=$ser[$aleatorio2];
            $servicios=array_add($servicios,$j,$servicio);
            $j++;
        }
        $servicios=array_unique($servicios);
        $clienteSim=Cliente::create([
            'id'=>$i,
            'numero_cliente'=>$i,
            'hospedado'=>$hospedado,
            'tipo_cliente'=>'ejecutiva',
            'pago'=>120,
            'simulacion_id'=>$simulacion->id
        ]);
        $idSim=$clienteSim->id;
        $clienteSim->servicio()->attach($servicios,['cliente_id'=>$idSim]);
        $servicios=$ser;
        //}
    }

    public static function simularClientesPremium(int $i){
        $simulacion=Simulacion::all()->last();
        $servicios=Servicio::where('servicio','WiFi')
            ->orWhere('servicio','TV-cable')
            ->orWhere('servicio','limpieza diaria')
            ->orWhere('servicio','Baño privado')
            ->orWhere('servicio','Sala Conferencias')
            ->orWhere('servicio','Centro de negocios')
            ->orWhere('servicio','Restaurant y Bar')
            ->orWhere('servicio','Atencion Personalizada')
            ->orWhere('servicio','Balneario')
            ->orWhere('servicio','Gimnasio')
            ->pluck('id')->toArray();
        $ser=$servicios;
        //for ($i=1;$i<=$clientesEconomica;$i++){
        $aleatorio=(rand(0,100))/100;
        if($aleatorio<=0.9){
            $hospedado=true;
        }else{
            $hospedado=false;
        }
        $aleatorio1=rand(1,10);
        $j=0;
        $servicios=array();
        while ($j<=$aleatorio1){
            $aleatorio2=rand(0,9);
            $servicio=$ser[$aleatorio2];
            $servicios=array_add($servicios,$j,$servicio);
            $j++;
        }
        $servicios=array_unique($servicios);
        $clienteSim=Cliente::create([
            'id'=>$i,
            'numero_cliente'=>$i,
            'hospedado'=>$hospedado,
            'tipo_cliente'=>'premium',
            'pago'=>180,
            'simulacion_id'=>$simulacion->id
        ]);
        $idSim=$clienteSim->id;
        $clienteSim->servicio()->attach($servicios,['cliente_id'=>$idSim]);
        $servicios=$ser;
        //}
    }
}
