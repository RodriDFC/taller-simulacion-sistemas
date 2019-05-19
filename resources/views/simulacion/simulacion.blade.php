@extends('layout')
@section('contenido')
 <h1>Tabla de la simulacion</h1>
  @if($datos->isNotEmpty())
   <table class="table table-hover table-bordered text-center">
    <thead class="thead-dark">
    <tr>
     <th scope="col">#</th>
     <th scope="col">Tipo Cliente</th>
     <th scope="col">Servicios</th>
     <th scope="col">hospedado</th>
     <th scope="col">Pago</th>
     <th scope="col">Ganancia Hotel</th>
    </tr>
    </thead>
    <tbody>
    @foreach($datos as $dato)
     <tr>
      <th scope="row">{{$dato->numero_cliente}}</th>
      <td>{{$dato->tipo_cliente}}</td>
      <td>{{$dato->servicios}}</td>
      <td>{{$dato->hospedado? 'SI':'NO'}}</td>
      <td>{{$dato->pago}}</td>
      <td>{{$dato->total_ganancia}}</td>
     </tr>
    @endforeach
    </tbody>
   </table>
  @else
   <li>No hay usuarios</li>
  @endif

@endsection