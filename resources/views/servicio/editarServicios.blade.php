@extends('layout')
@section('contenido')
    <div class="row justify-content-center mt-3">
        <div class="col-6">
            <h3>Editar Servicio: {{$servicio->servicio}}</h3>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-6">
            <form method="POST" action="{{route('actualizarServicios',$servicio)}}" autocomplete="off">
                {{method_field('PUT')}}
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="servicio">Servicio</label>
                    <input id="servicio" type="text" name="servicio" class="form-control" value="{{old('servicio',$servicio->servicio)}}">
                    <span class="alert-danger">{{ $errors->first('servicio') }}</span>
                </div>
                <div class="form-group">
                    <label for="costo">Precio del Servicio</label>
                    <input id="costo" type="number" name="costo" class="form-control" value="{{old('costo',$servicio->costo)}}">
                    <span class="alert-danger">{{ $errors->first('costo') }}</span>
                </div>
                <div class="form-group">
                    <label for="exigencia">requerimiento del servicio</label>
                    <select name="exigencia" id="exigencia" class="form-control">
                        <option value="{{$servicio->exigencia}}">{{$servicio->exigencia}}</option>
                        <option value="economica">economica</option>
                        <option value="negocios">negocios</option>
                        <option value="ejecutiva">ejecutiva</option>
                        <option value="premium">premium</option>
                    </select>
                </div>
                <div class="form-group row justify-content-end">
                    <a href="{{route('servicios')}}" class="btn btn-danger mr-3">Cancelar</a>
                    <button type="submit" class="btn btn-primary mr-3">Editar</button>
                </div>
            </form>
        </div>
    </div>
@endsection