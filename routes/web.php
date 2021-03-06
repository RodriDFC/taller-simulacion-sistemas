<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('inicio');
//simulacion
Route::get('/nueva-simulacion','SimulacionController@crearSimulacion')->name('nuevaSimulacion');
Route::get('/simulacion','SimulacionController@simulacion')->name('simulacion');
Route::get('/tabla-simulacion','SimulacionController@tablaSimulacion')->name('tablaSimulacion');
Route::get('/datos-simulacion','SimulacionController@datosSimulacion')->name('datosSimulacion');
//habitacion
Route::post('/habitaciones','HabitacionController@guardar')->name('guardarHabitacion');
Route::get('/construir_habitaciones','HabitacionController@construir')->name('construirHabitacion');
Route::get('/habitaciones_ocupadas','ClienteController@habitacionesOcupadas')->name('habitacionesOcupadas');
//servicios
Route::get('/Servicios','ServiciosController@servicios')->name('servicios');
Route::post('/definirServicios','ServiciosController@definirServicios')->name('guardarServicios');
Route::get('/crearServicios','ServiciosController@crearServicios')->name('crearServicios');
Route::post('/guardarServicios','ServiciosController@guardarServicios')->name('serviciosGuardar');
Route::get('/editarServicios/{servicio}/editar','ServiciosController@editarServicios')->name('editarServicios');
Route::put('/editarServicios/{servicio}','ServiciosController@actualizarServicios')->name('actualizarServicios');
Route::delete('/servicios/{servicio}/eliminar','ServiciosController@eliminarServicio')->name('eliminarServicio');

//temporada
Route::post('/temporada','SimulacionController@definirTemporada')->name('definirTemporada');

//Reportes con graficos de la simulacion
Route::get('/reportesGraficos','SimulacionController@crearGraficos')->name('reportesGraficos');

Route::get('/reportesPerdidas','ClienteController@clientesNoHospedados')->name('reportesPerdidas');
Route::get('/reportesPerdidasPdf','ClienteController@reportesPerdidasPdf')->name('reportesPerdidasPdf');
Route::get('/reportesGananciasPorHabitacion','DemandaController@reportesGananciasPorHabitacion')->name('reportesGananciasPorHabitacion');


//habitaciones
Route::get('/habitaciones','HabitacionController@habitaciones')->name('habitaciones');
Route::get('/editarHabitaciones/{habitacion}/editar','habitacionController@editarHabitacion')->name('editarHabitacion');
Route::put('/editarHabitacion/{habitacion}','HabitacionController@actualizarHabitacion')->name('actualizarHabitacion');

//repotes PDF
Route::get('/demanda-insatisfecha-PDF','DemandaController@reporteDemandaInsatisfechaPDF')->name('reporteDemandaInsatisfechaPDF');
Route::get('/tabla-simulacion-pdf','DemandaController@tablaPDF')->name('tablaPDF');
Route::get('/reporte-servicios','ServiciosController@reporteServicios')->name('reporteServicios');
Route::get('/reporte-servicios-pdf','ServiciosController@reporteServiciosPDF')->name('reporteServiciosPdf');

Route::get('/reporteGraficosPdf','SimulacionController@reporteGraficosPdf')->name('reporteGraficosPdf');


//ayuda
Route::get('/ayuda','SimulacionController@ayuda')->name('ayuda');

