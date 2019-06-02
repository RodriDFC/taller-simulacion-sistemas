<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\TablaSimulacion;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }

    public function clientesNoHospedados()
    {
        $clientesPerdidos = TablaSimulacion::all();

        //Obtener total ganacia y total perdida
        $lastPerdidaTotal = $clientesPerdidos->last()->total_perdida;
        $lastGananciaTotal = $clientesPerdidos->last()->total_ganancia;
        $gananciaPerdida = [$lastGananciaTotal, $lastPerdidaTotal];
        
        //Numero de clientes hospedados y no hospedados
        $hospedadosYnoHospedados;
        $clientesHospedados = 0;
        $clientesNoHospedados = 0;
        
        foreach ($clientesPerdidos as $clientesPerdido => $value) {
            if ($value->hospedado == 1) {
                $clientesHospedados++;
            }else {
                $clientesNoHospedados++;
            }
        }

        $hospedadosYnoHospedados = [$clientesHospedados, $clientesNoHospedados];
        return view('simulacion/graficosPerdidas', compact('clientesPerdidos','hospedadosYnoHospedados', 'gananciaPerdida'));
    }
}
