@extends('layout')
@section('contenido')
    @if($habitaciones->isNotEmpty())
        <div class="row">
            <div class="col-10">
                <h1>Habitaciones del Hotel</h1>
            </div>
        </div>
        <table class="table table-hover table-bordered text-center">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Cantidad de habitaciones</th>
                <th scope="col">Tipo de habitacion</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($habitaciones as $habitacion)
                <tr>
                    <th scope="row">{{$habitacion->id}}</th>
                    <td>{{$habitacion->cantidad_habitaciones}}</td>
                    <td>{{$habitacion->tipo_habitacion}}</td>
                    <td>
                        <a class="btn btn-info" href="{{route('editarHabitacion',$habitacion)}}">Editar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <li>No hay habitaciones</li>
    @endif
@endsection