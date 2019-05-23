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
//servicios
Route::post('/definirServicios','ServiciosController@definirServicios')->name('guardarServicios');

//temporada
Route::post('/temporada','SimulacionController@definirTemporada')->name('definirTemporada');