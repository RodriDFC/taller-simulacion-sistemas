<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    protected $fillable = [
        'cantidad_habitaciones','id','tipo_habitacion',
    ];
}
