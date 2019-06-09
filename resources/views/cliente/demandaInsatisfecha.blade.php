@extends('layout')
@section('contenido')
    <div class="row">
        <div class="col-10 mt-1">
            <h2>Demanda Insatisfecha por falta de habitaciones</h2>
        </div>
        <div class="col-auto mt-2">
            <a class="btn btn-info" href="{{route('reporteDemandaInsatisfechaPDF')}}">Reporte PDF</a>
        </div>
    </div>
    <hr>
    @if($demandaInsatisfechaEconomica>0)
        <h6>demanda insatisfecha Economica: {{$demandaInsatisfechaEconomica}}</h6>
        <h6>Total Perdida: {{$clientesEconomica->sum('pago')}}</h6>
        <table class="table table-hover table-bordered text-center">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tipo Cliente</th>
                <th scope="col">Servicios</th>
                <th scope="col">Pago</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clientesEconomica as $clienteEconomica)
                <tr>
                    <th scope="row">{{$clienteEconomica->numero_cliente}}</th>
                    <td>{{$clienteEconomica->tipo_cliente}}</td>
                    <td>{{$clienteEconomica->servicios}}</td>
                    <td>{{$clienteEconomica->pago}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h4>No Existe demanda insatisfecha para habitaciones del tipo Economica</h4>
    @endif
    <hr>
    @if($demandaInsatisfechaNegocios>0)
        <h6>demanda insatisfecha Negocios: {{$demandaInsatisfechaNegocios}}</h6>
        <h6>Total Perdida: {{$clientesNegocios->sum('pago')}}</h6>
        <table class="table table-hover table-bordered text-center">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tipo Cliente</th>
                <th scope="col">Servicios</th>
                <th scope="col">Pago</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clientesNegocios as $clienteNegocios)
                <tr>
                    <th scope="row">{{$clienteEconomica->numero_cliente}}</th>
                    <td>{{$clienteNegocios->tipo_cliente}}</td>
                    <td>{{$clienteNegocios->servicios}}</td>
                    <td>{{$clienteNegocios->pago}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h4>No Existe demanda insatisfecha para habitaciones del tipo Negocios</h4>
    @endif
    <hr>
    @if($demandaInsatisfechaEjecutiva>0)
        <h6>demanda insatisfecha Ejecutiva: {{$demandaInsatisfechaEjecutiva}}</h6>
        <h6>Total Perdida: {{$clientesEjecutiva->sum('pago')}}</h6>
        <table class="table table-hover table-bordered text-center">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tipo Cliente</th>
                <th scope="col">Servicios</th>
                <th scope="col">Pago</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clientesEjecutiva as $clienteEjecutiva)
                <tr>
                    <th scope="row">{{$clienteEjecutiva->numero_cliente}}</th>
                    <td>{{$clienteEjecutiva->tipo_cliente}}</td>
                    <td>{{$clienteEjecutiva->servicios}}</td>
                    <td>{{$clienteEjecutiva->pago}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h4>No Existe demanda insatisfecha para habitaciones del tipo Ejecutiva</h4>
    @endif
    <hr>
    @if($demandaInsatisfechaPremium>0)
        <h6>demanda insatisfecha Premium: {{$demandaInsatisfechaPremium}}</h6>
        <h6>Total Perdida: {{$clientesPremium->sum('pago')}}</h6>
        <table class="table table-hover table-bordered text-center">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tipo Cliente</th>
                <th scope="col">Servicios</th>
                <th scope="col">Pago</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clientesPremium as $clientePremium)
                <tr>
                    <th scope="row">{{$clientePremium->numero_cliente}}</th>
                    <td>{{$clientePremium->tipo_cliente}}</td>
                    <td>{{$clientePremium->servicios}}</td>
                    <td>{{$clientePremium->pago}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h4>No Existe demanda insatisfecha para habitaciones del tipo Premium</h4>
    @endif
    <div class="row">
        <div class="col">
            <a class="btn btn-info mb-3" href="{{route('datosSimulacion')}}">Tabla Simulacion</a>
        </div>
    </div>
@endsection