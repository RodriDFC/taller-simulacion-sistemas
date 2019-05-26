@extends('layout')
@section('contenido')
  @if($datos->isNotEmpty())

   <div class="row">
    <div class="col-6">
     <h1>Tabla de la simulacion</h1>
    </div>
    <div class="col-auto mt-2 offset-2">
      <a class="btn btn-info" href="{{route('reportesGraficos')}}">Reporte Grafico</a>
    </div>
    <div class="col-auto">
     <button type="button" class="btn btn-info mt-2" data-toggle="modal" data-target="#modal1">Habitaciones Construidas</button>
     <div class="modal fade" id="modal1">
      <div class="modal-dialog">
       <div class="modal-content">
        <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal"
                 aria-label="close">&times;</button>
        </div>
        <div class="modal-body">
         @if($habitacionConstruidas!=null)
            <h5>las habitaciones que se recomienda construir:</h5>
            <p>{{$habitacionConstruidas->cantidad_habitaciones_economica}} habitaciones de tipo Economica</p>
            <p>{{$habitacionConstruidas->cantidad_habitaciones_negocios}} habitaciones de tipo Negocios</p>
            <p>{{$habitacionConstruidas->cantidad_habitaciones_ejecutiva}} habitaciones de tipo Ejecutiva</p>
            <p>{{$habitacionConstruidas->cantidad_habitaciones_premium}} habitaciones de tipo Premium</p>
         @else
            <h4>No se RECOMIENDA construir habitaciones porque la demanda es muy baja</h4>
         @endif
        </div>

       </div>
      </div>
     </div>
    </div>
   </div>



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