@extends('layout')
@section('contenido')
    <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    @if($errors->any())
                        <div class="alert-danger">
                            <h3>Se tiene los siguientes errores en el formulario</h3>
                            <div class="alert-danger">
                                <ul>
                                    @foreach($errors->all() as $errors)
                                        <li>{{$errors}}</li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    @endif
                    <form method="POST" action="{{route('guardarServicios')}}">
                        {{ csrf_field() }}
                        <div class="row ">
                            <div class="col form-group">
                                <label for="serviciosCliente">Seleccione los servicios que puedan requerir los clientes</label>
                                @foreach($servicios as $id=>$servicio)
                                    <label for="serviciosCliente" class="btn btn-outline-dark form-control">
                                        <input type="checkbox" value="{{$id}}" name="serviciosCliente[]">
                                        {{$servicio}}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
                            <button type="submit"  class="btn btn-success">Siguiente</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection