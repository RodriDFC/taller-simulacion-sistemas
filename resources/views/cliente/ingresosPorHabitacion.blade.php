@extends('layout')
@section('contenido')
@if($datosEconomica->isNotEmpty() && $datosNegocios->isNotEmpty() && $datosEjecutiva->isNotEmpty() && $datosPremium->isNotEmpty())
    <div class="row">
        <div class="col-6">
            <div class="table-active">
                <h1>Ingresos por habitacion economica</h1>
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
                        @foreach ($datosEconomica as $item)
                            <tr>
                                <th scope="row">{{$item->numero_cliente}}</th>
                                <td>{{$item->tipo_cliente}}</td>
                                <td>{{$item->servicios}}</td>
                                <td>{{$item->pago}}</td>
                            </tr>
                        @endforeach
                            <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td scope="row">Total ingresos</td>
                                <td>{{$gananciasPorHabitaciones[0]}}</td>
                            </tr>
                    </tbody>
                </table>
            </div>
            <div class="table-active">
                <h1>Ingresos por habitacion de negocios</h1>
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
                        @foreach ($datosNegocios as $item)
                            <tr>
                                <th scope="row">{{$item->numero_cliente}}</th>
                                <td>{{$item->tipo_cliente}}</td>
                                <td>{{$item->servicios}}</td>
                                <td>{{$item->pago}}</td>
                            </tr>
                        @endforeach
                            <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td scope="row">Total ingresos</td>
                                <td>{{$gananciasPorHabitaciones[1]}}</td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-6">
                <div class="table-active">
                    <h1>Ingresos por habitacion ejecutiva</h1>
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
                            @foreach ($datosEjecutiva as $item)
                                <tr>
                                    <th scope="row">{{$item->numero_cliente}}</th>
                                    <td>{{$item->tipo_cliente}}</td>
                                    <td>{{$item->servicios}}</td>
                                    <td>{{$item->pago}}</td>
                                </tr>
                            @endforeach<tr>
                                <th scope="row"></th>
                                    <td></td>
                                    <td scope="row">Total ingresos</td>
                                    <td>{{$gananciasPorHabitaciones[2]}}</td>
                                </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-active">
                    <h1>Ingresos por habitacion premium</h1>
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
                            @foreach ($datosPremium as $item)
                                <tr>
                                    <th scope="row">{{$item->numero_cliente}}</th>
                                    <td>{{$item->tipo_cliente}}</td>
                                    <td>{{$item->servicios}}</td>
                                    <td>{{$item->pago}}</td>
                                </tr>
                            @endforeach
                                <tr>
                                    <th scope="row"></th>
                                    <td></td>
                                    <td scope="row">Total ingresos</td>
                                    <td>{{$gananciasPorHabitaciones[3]}}</td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
@else
<li>No Realizo una Simulacion</li>
@endif
@endsection