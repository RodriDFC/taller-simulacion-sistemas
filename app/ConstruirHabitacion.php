<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConstruirHabitacion extends Model
{
    protected $table = 'construir_habitacion';
    public $timestamps = false;
    protected $fillable = [
        'cantidad_habitaciones_economica','cantidad_habitaciones_negocios',
        'cantidad_habitaciones_ejecutiva','cantidad_habitaciones_premium',
        'simulacion_id'
    ];
}
