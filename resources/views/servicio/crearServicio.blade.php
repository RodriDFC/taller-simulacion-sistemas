@extends('layout')
@section('contenido')
    <div class="row justify-content-center mt-3">
        <div class="col-6">
            <h3>Registrar Nuevo Servicio</h3>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-6">
            <form method="POST" action="{{route('serviciosGuardar')}}" autocomplete="off">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="servicio">Servicio</label>
                    <input id="servicio" type="text" name="servicio" class="form-control">
                    <span class="alert-danger">{{ $errors->first('servicio') }}</span>
                </div>
                <div class="form-group">
                    <label for="costo">Costo del Servicio</label>
                    <input id="costo" type="number" name="costo" class="form-control">
                    <span class="alert-danger">{{ $errors->first('costo') }}</span>
                </div>
                <div class="form-group">
                    <label for="exigencia">requerimiento del servicio</label>
                    <select name="exigencia" id="exigencia" class="form-control">
                        <option value="economica">Economica</option>
                        <option value="negocios">Negocios</option>
                        <option value="ejecutiva">Ejecutiva</option>
                        <option value="premium">Premium</option>
                    </select>
                </div>
                <div class="form-group row justify-content-end">
                    <a href="{{route('servicios')}}" class="btn btn-danger mr-3">Cancelar</a>
                    <button type="submit" class="btn btn-primary mr-3">Crear</button>
                </div>
            </form>
        </div>
    </div>
@endsection