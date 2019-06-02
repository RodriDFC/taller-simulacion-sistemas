@extends('layout')
@section('contenido')
    <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('guardarHabitacion')}}">
                        {!! csrf_field() !!}
                        <label for="lapso_simulacion">Lapso de tiempo de la simulacion</label>
                        <select class="form-control" id="lapso_simulacion" name="lapso_simulacion">
                            <option value="1">Mensual</option>
                            <option value="1.5">Bimestral</option>
                            <option value="2">Trimestral</option>
                            <option value="3">Semestral</option>
                        </select>
                        <label for="habitacion">Agrege cantidad de cuartos maxima a construir para la simulacion</label>
                        <input type="number" class="form-control" id="habitacion" name="habitacion" required>
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