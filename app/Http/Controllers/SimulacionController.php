<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Servicio;
use App\ConstruirHabitacion;
use App\Demanda;
use App\Simulacion;
use App\TablaSimulacion;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;

class SimulacionController extends Controller{

    /* en este metodo se crea la simulacion,
        se eliminan los datos de anteriores simulaciones
        y retorna a la vista donde se selecciona el lapso de tiempo, habitaciones a construir
        y lapso de tiempo   **/
    public function crearSimulacion(){
        $registros = Simulacion::all()->toArray();
        Simulacion::destroy($registros);
        //$registros1 = TablaSimulacion::all()->toArray();
        //TablaSimulacion::destroy($registros1);
        Simulacion::create();
        return view('simulacion/nuevo');
    }

    /* en este metodo se guardan la demanda esperada para cada tipo de habitacion,
        segun la temporada seleccionada
        y redirecciona al metodo simulacion **/
    public function definirTemporada(Request $request){
        $simulacion = Simulacion::all()->last();
        $demandaEconomica = $this->clientesEconomica($request['temporada']);
        $demandaNegocios = $this->clientesNegocios($request['temporada']);
        $demandaEjecutiva = $this->clientesEjecutiva($request['temporada']);
        $demandaPremium = $this->clientesPremium($request['temporada']);
        $simulacion->update([
            'temporada' => $request['temporada'],
            'clientes_simulados_economica' => $demandaEconomica,
            'clientes_simulados_negocios' => $demandaNegocios,
            'clientes_simulados_ejecutiva' => $demandaEjecutiva,
            'clientes_simulados_premium' => $demandaPremium,
        ]);
        //Cliente::simularClientes($demandaEconomica);
        return redirect()->route('simulacion');
    }

    /* en este metodo se obtine la demanda esperada para cada tipo de habitacion economica,
        segun la temporada seleccionada   **/
    public function clientesEconomica($temporada){
        $demandaEconomicaPromedio = Demanda::where([
            ['temporada', '=', null],
            ['tipo', '=', 'economica']
        ])->value('cantidad_clientes');
        if ($temporada == 'alta') {
            $demandaEconomicaAlta = Demanda::where([
                ['temporada', '=', 'alta'],
                ['tipo', '=', 'economica']
            ])->value('cantidad_clientes');
            $aleatorio = (rand(0, 100)) / 100;
            $demandaEconomica = $demandaEconomicaPromedio + ($demandaEconomicaAlta - $demandaEconomicaPromedio) * $aleatorio;
        } else {
            $demandaEconomicaBaja = Demanda::where([
                ['temporada', '=', 'baja'],
                ['tipo', '=', 'economica']
            ])->value('cantidad_clientes');
            $aleatorio = (rand(0, 1000)) / 1000;
            $demandaEconomica = $demandaEconomicaBaja + ($demandaEconomicaPromedio - $demandaEconomicaBaja) * $aleatorio;
        }
        $demandaEconomica = (int)round($demandaEconomica, 0, PHP_ROUND_HALF_UP);
        return $demandaEconomica;
    }

    /* en este metodo se obtine la demanda esperada para cada tipo de habitacion negocios,
       segun la temporada seleccionada   **/
    public function clientesNegocios($temporada){
        $demandaNegociosPromedio = Demanda::where([
            ['temporada', '=', null],
            ['tipo', '=', 'negocios']
        ])->value('cantidad_clientes');
        if ($temporada == 'alta') {
            $demandaNegociosAlta = Demanda::where([
                ['temporada', '=', 'alta'],
                ['tipo', '=', 'negocios']
            ])->value('cantidad_clientes');
            $aleatorio = (rand(0, 1000)) / 1000;
            $demandaNegocios = $demandaNegociosPromedio + ($demandaNegociosAlta - $demandaNegociosPromedio) * $aleatorio;
        } else {
            $demandaNegociosBaja = Demanda::where([
                ['temporada', '=', 'baja'],
                ['tipo', '=', 'negocios']
            ])->value('cantidad_clientes');
            $aleatorio = (rand(0, 1000)) / 1000;
            $demandaNegocios = $demandaNegociosBaja + ($demandaNegociosPromedio - $demandaNegociosBaja) * $aleatorio;
        }
        $demandaNegocios = (int)round($demandaNegocios, 0, PHP_ROUND_HALF_UP);
        return $demandaNegocios;
    }

    /* en este metodo se obtine la demanda esperada para cada tipo de habitacion ejecutiva,
       segun la temporada seleccionada   **/
    public function clientesEjecutiva($temporada){
        $demandaEjecutivaPromedio = Demanda::where([
            ['temporada', '=', null],
            ['tipo', '=', 'ejecutiva']
        ])->value('cantidad_clientes');
        if ($temporada == 'alta') {
            $demandaEjecutivaAlta = Demanda::where([
                ['temporada', '=', 'alta'],
                ['tipo', '=', 'ejecutiva']
            ])->value('cantidad_clientes');
            $aleatorio = (rand(0, 1000)) / 1000;
            $demandaEjecutiva = $demandaEjecutivaPromedio + ($demandaEjecutivaAlta - $demandaEjecutivaPromedio) * $aleatorio;
        } else {
            $demandaEjecutivaBaja = Demanda::where([
                ['temporada', '=', 'baja'],
                ['tipo', '=', 'ejecutiva']
            ])->value('cantidad_clientes');
            $aleatorio = (rand(0, 1000)) / 1000;
            $demandaEjecutiva = $demandaEjecutivaBaja + ($demandaEjecutivaPromedio - $demandaEjecutivaBaja) * $aleatorio;
        }
        $demandaEjecutiva = (int)round($demandaEjecutiva, 0, PHP_ROUND_HALF_UP);
        return $demandaEjecutiva;
    }

    /* en este metodo se obtine la demanda esperada para cada tipo de habitacion premium,
       segun la temporada seleccionada   **/
    public function clientesPremium($temporada){
        $demandaPremiumPromedio = Demanda::where([
            ['temporada', '=', null],
            ['tipo', '=', 'premium']
        ])->value('cantidad_clientes');
        if ($temporada == 'alta') {
            $demandaPremiumAlta = Demanda::where([
                ['temporada', '=', 'alta'],
                ['tipo', '=', 'premium']
            ])->value('cantidad_clientes');
            $aleatorio = (rand(0, 1000)) / 1000;
            $demandaPremium = $demandaPremiumPromedio + ($demandaPremiumAlta - $demandaPremiumPromedio) * $aleatorio;
        } else {
            $demandaPremiumBaja = Demanda::where([
                ['temporada', '=', 'baja'],
                ['tipo', '=', 'premium']
            ])->value('cantidad_clientes');
            $aleatorio = (rand(0, 1000)) / 1000;
            $demandaPremium = $demandaPremiumBaja + ($demandaPremiumPromedio - $demandaPremiumBaja) * $aleatorio;
        }
        $demandaPremium = (int)round($demandaPremium, 0, PHP_ROUND_HALF_UP);
        return $demandaPremium;
    }

    /* en este metodo se obtine la demanda esperada para cada tipo de habitacion, lapso de tiempo
        y cantidad de tiempo y con estos datos se obtiene la demanda total, y se simula los clientes
        y redirige al metodo tablaSimulacion
     **/
    public function simulacion(){
        $simulacion=Simulacion::all()->last();
        $demandaEconomica=$simulacion->clientes_simulados_economica;
        $demandaNegocios=$simulacion->clientes_simulados_negocios;
        $demandaEjecutiva=$simulacion->clientes_simulados_ejecutiva;
        $demandaPremium=$simulacion->clientes_simulados_premium;
        $demandaTotal=$demandaEconomica+$demandaNegocios+$demandaEjecutiva+$demandaPremium;
        $periodo=$simulacion->lapso_simulacion;
        $cantidad_tiempo=$simulacion->cantidad_tiempo;
        $demandaTotal=$demandaTotal*$periodo*$cantidad_tiempo;
        for ($i=1;$i<=$demandaTotal;$i++){
            $aleatorio=(rand(0, 1000)) / 1000;
            if($aleatorio<=0.1485){
                Cliente::simularClientesPremium($i);
            }elseif ($aleatorio<=0.3662){
                Cliente::simularClientesEjecutiva($i);
            }elseif ($aleatorio<=0.6635){
                Cliente::simularClientesNegocios($i);
            }else{
                Cliente::simularClientes($i);
            }
        }
        return redirect()->route('tablaSimulacion');
    }
    /* en este metodo se genera la tabla de simulacion: obteniendo los cientes los servicios que pidieron
       el pago total que se obtine sumando del pago por la habitacion y pago total por los servicios,
        y retorna el metodo para construir habitacion
     **/
    public function tablaSimulacion(){
        $registros1 = TablaSimulacion::all()->toArray();
        TablaSimulacion::destroy($registros1);
        $simulacion=Simulacion::all()->last();
        $clientes=$simulacion->clientes;
        foreach ($clientes as $cliente){
            $servici=$cliente->servicio->all();
            $servicio=new Collection();
            foreach ($servici as $ser){
                $servicio->push($ser['servicio'].'('.$ser['costo'].'$)');
            }
            $costoT=$cliente->servicio->sum('costo');
            TablaSimulacion::create([
                'id'=>$cliente->id,
                'numero_cliente'=>$cliente->numero_cliente,
                'tipo_cliente'=>$cliente->tipo_cliente,
                'servicios'=>$servicio->implode(' - '),
                'hospedado'=>$cliente->hospedado,
                'pago'=>$cliente->hospedado?$costoT+$cliente->pago:0,
                'perdida'=>$cliente->hospedado?0:$costoT+$cliente->pago,
                'total_ganancia'=>$cliente->hospedado?TablaSimulacion::sum('pago')+$costoT+$cliente->pago:TablaSimulacion::sum('pago'),
                'total_perdida'=>$cliente->hospedado?TablaSimulacion::sum('perdida'):TablaSimulacion::sum('perdida')+$costoT+$cliente->pago,
                'simulacion_id'=>$simulacion->id
            ]);
        }
        //return redirect()->route('datosSimulacion');
        return redirect()->route('construirHabitacion');
    }
    /* en este metodo se muestra la tabla de simulacion**/
    public function datosSimulacion(){
        $datos=TablaSimulacion::all();
        $habitacionConstruidas=ConstruirHabitacion::all()->last();
       return view('simulacion/simulacion',compact('datos','habitacionConstruidas'));
    }
    /* en este metodo se generan los graficos de la tabla de simulacion**/
    public function crearGraficos(){
        //Count number of services
        $datos = TablaSimulacion::all();
        $datos1 = Servicio::all()->pluck('servicio');
        $servicios;
        $indice = 0;

        foreach ($datos1 as $dato1) {
            $count = 0;
            foreach ($datos as $dato) {
                
                if (strpos($dato->servicios, $dato1) !== false ) {
                    $count++;
                }
            }
            $servicios[$indice] = [$dato1, $count];
            $indice++;
        }
        
        $countWifi = 0;
        $countTVCable = 0;
        $countLimpieza = 0;
        $countBañoPrivado = 0;
        $countSalaConferencias = 0;
        $countCentroNegocios = 0;
        $countRestaurant = 0;
        $countAtencionPersonalizada = 0;
        $countBalneario = 0;
        $countGimnasio = 0;
        //$servicios;
        
        $countEconomico = 0;
        $countEjecutivo = 0;
        $countNegocios = 0;
        $countPremium = 0;
        $tipoHabitaciones;

        foreach ($datos as $dato => $value) {

            /*if ( strpos($value->servicios, "WiFi") !== false ) {
                $countWifi++;
                $servicios[0] = ['WiFi', $countWifi];
            }
            if ( strpos($value->servicios, "TV-cable") !== false ) {
                $countTVCable++;
                $servicios[1] = ['TV-cable', $countTVCable];
            }
            if ( strpos($value->servicios, "limpieza diaria") !== false ) {
                $countLimpieza++;
                $servicios[2] = ['Limpieza diaria', $countLimpieza];
            }
            if ( strpos($value->servicios, "Baño privado") !== false ) {
                $countBañoPrivado++;
                $servicios[3] = ['Baño privado', $countBañoPrivado];
            }
            if ( strpos($value->servicios, "Sala Conferencias") !== false ) {
                $countSalaConferencias++;
                $servicios[4] = ['Sala de conferencias', $countSalaConferencias];
            }
            if ( strpos($value->servicios, "Centro de negocios") !== false ) {
                $countCentroNegocios++;
                $servicios[5] = ['Centro de negocios', $countCentroNegocios];
            }
            if ( strpos($value->servicios, "Restaurant y Bar") !== false ) {
                $countRestaurant++;
                $servicios[6] = ['Restaurant y bar', $countRestaurant];
            }
            if ( strpos($value->servicios, "Atencion Personalizada") !== false ) {
                $countAtencionPersonalizada++;
                $servicios[7] = ['Atencion personalizada', $countAtencionPersonalizada];
            }
            if ( strpos($value->servicios, "Balneario") !== false ) {
                $countBalneario++;
                $servicios[8] = ['Balneario', $countBalneario];
            }
            if ( strpos($value->servicios, "Gimnasio") !== false ) {
                $countGimnasio++;
                $servicios[9] = ['Gimnasio', $countGimnasio];
            }*/
            if ($value->tipo_cliente == 'economica' ) {
                $countEconomico++;
                $tipoHabitaciones[0] = ['Economico', $countEconomico ,"red"];
            }
            if ($value->tipo_cliente == 'negocios' ) {
                $countNegocios++;
                $tipoHabitaciones[1] = ['Negocios', $countNegocios, "blue"];
            }
            if ($value->tipo_cliente == 'ejecutiva' ) {
                $countEjecutivo++;
                $tipoHabitaciones[2] = ['Ejecutiva', $countEjecutivo, "gold"];
            }
            if ($value->tipo_cliente == 'premium' ) {
                $countPremium++;
                $tipoHabitaciones[3] = ['Premium', $countPremium, "green"];
            }
        }
        //dd($servicios);
        return view('simulacion/graficos', compact('servicios'), compact('tipoHabitaciones'));
    }

    public function reporteGraficosPdf(Request $request){
        //Count number of services
        $datos = TablaSimulacion::all();
        $datos1 = Servicio::all()->pluck('servicio');
        $servicios;
        $indice = 0;

        foreach ($datos1 as $dato1) {
            $count = 0;
            foreach ($datos as $dato) {
                
                if (strpos($dato->servicios, $dato1) !== false ) {
                    $count++;
                }
            }
            $servicios[$indice] = [$dato1, $count];
            $indice++;
        }
        
        $countWifi = 0;
        $countTVCable = 0;
        $countLimpieza = 0;
        $countBañoPrivado = 0;
        $countSalaConferencias = 0;
        $countCentroNegocios = 0;
        $countRestaurant = 0;
        $countAtencionPersonalizada = 0;
        $countBalneario = 0;
        $countGimnasio = 0;
        //$servicios;
        
        $countEconomico = 0;
        $countEjecutivo = 0;
        $countNegocios = 0;
        $countPremium = 0;
        $tipoHabitaciones;

        foreach ($datos as $dato => $value) {

            if ($value->tipo_cliente == 'economica' ) {
                $countEconomico++;
                $tipoHabitaciones[0] = ['Economico', $countEconomico ,"red"];
            }
            if ($value->tipo_cliente == 'negocios' ) {
                $countNegocios++;
                $tipoHabitaciones[1] = ['Negocios', $countNegocios, "blue"];
            }
            if ($value->tipo_cliente == 'ejecutiva' ) {
                $countEjecutivo++;
                $tipoHabitaciones[2] = ['Ejecutiva', $countEjecutivo, "gold"];
            }
            if ($value->tipo_cliente == 'premium' ) {
                $countPremium++;
                $tipoHabitaciones[3] = ['Premium', $countPremium, "green"];
            }
        }
        //dd($servicios);
        $pdf = PDF::loadView('simulacion/graficos', compact('servicios', 'tipoHabitaciones'));
        return $pdf->stream();

    /* en este metodo se generan la ayuda del sistema**/
    public function ayuda(){
        return view('ayuda/ayuda');
    }
}
