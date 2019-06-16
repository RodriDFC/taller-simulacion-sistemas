@extends('layout')
@section('contenido')
    <div class="row justify-content-center mt-3">
        <div class="col-6">
            <h3>Editar cantidad de habitaciones: {{$habitacion->tipo_habitacion}}</h3>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-6">
            <form method="POST" action="{{route('actualizarHabitacion',$habitacion)}}" autocomplete="off">
                {{method_field('PUT')}}
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="cantidad_habitaciones">Cantidad de Habitaciones</label>
                    <input id="cantidad_habitaciones" type="number" name="cantidad_habitaciones" class="form-control" value="{{old('cantidad_habitaciones',$habitacion->cantidad_habitaciones)}}">
                    <span class="text-danger">{{ $errors->first('cantidad_habitaciones') }}</span>
                </div>
                <div class="form-group">
                    <label for="tipo_habitacion">Tipo de Servicio</label>
                    <input id="tipo_habitacion" type="text" name="tipo_habitacion" class="form-control" value="{{old('tipo_habitacion',$habitacion->tipo_habitacion)}}" disabled>
                </div>
                <div class="form-group">
                    <label for="precio_habitacion">Precio de la habitacion</label>
                    <input id="precio_habitacion" type="number" name="precio_habitacion" class="form-control" value="{{old('precio_habitacion',$habitacion->precio_habitacion)}}">
                    <span class="text-danger">{{ $errors->first('precio_habitacion') }}</span>
                </div>
                <div class="form-group row justify-content-end">
                    <a href="{{route('habitaciones')}}" class="btn btn-danger mr-3">Cancelar</a>
                    <button type="submit" class="btn btn-primary mr-3">Editar</button>
                </div>
            </form>
        </div>
    </div>
@endsection