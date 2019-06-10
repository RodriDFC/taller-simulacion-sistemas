@extends('layout')
@section('contenido')
    <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('definirTemporada')}}">
                        {!! csrf_field() !!}
                        <label for="temporada">Seleccione la temporada</label>
                        <select class="form-control" id="temporada" name="temporada">
                            <option value="alta">temporada Alta (Oct, Nov, Dic, Ene, Feb, Mar)</option>
                            <option value="baja">temporada Baja (Abr, May, Jun, Jul, Ago, Sep)</option>
                        </select>
                        <div class="modal-footer">
                            <a href="#" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
                            <button type="submit"  class="btn btn-success">Iniciar Simulacion</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection