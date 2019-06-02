@extends('layout')
@section('contenido')
    @if($servicios->isNotEmpty())
        <div class="row">
            <div class="col-10">
                <h1>Servicios del Hotel</h1>
            </div>
            <div class="col-auto">
                <a class="btn btn-primary mt-2" href="{{route('crearServicios')}}">Nuevo Servicio</a>
            </div>
        </div>
        <table class="table table-hover table-bordered text-center">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Servicio</th>
                <th scope="col">Costo</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($servicios as $servicio)
                <tr>
                    <th scope="row">{{$servicio->id}}</th>
                    <td>{{$servicio->servicio}}</td>
                    <td>{{$servicio->costo}}</td>
                    <td>
                        <form method="POST" action="{{route('eliminarServicio',$servicio)}}">
                            {{method_field('DELETE')}}
                            {!! csrf_field() !!}
                            <a class="btn btn-info" href="{{route('editarServicios',$servicio)}}">Editar</a>
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <li>No hay usuarios</li>
    @endif

@endsection