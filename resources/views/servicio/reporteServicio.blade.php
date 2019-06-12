@extends('layout')
@section('contenido')
    <div class="row">
        <div class="col-11">
            <h3>Reporte Servicios</h3>
        </div>
        <div class="col">
            <a class="btn btn-outline-info" href="{{route('reporteServiciosPdf')}}">PDF</a>
        </div>
    </div>
        <table class="table table-hover table-bordered text-center">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Servicio</th>
                <th scope="col">Cantidad de veces Pedido</th>
                <th scope="col">Precio Unitario</th>
                <th scope="col">Ganancia Hotel por el servicio</th>
            </tr>
            </thead>
            <tbody>
            @foreach($servicios as $servicio)
                <tr>
                    <td>{{$servicio[0]}}</td>
                    <td>{{$servicio[1]}}</td>
                    <td>{{$servicio[2]}}</td>
                    <td>{{$servicio[3]}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
@endsection