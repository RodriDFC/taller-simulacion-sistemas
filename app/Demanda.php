<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demanda extends Model
{
    protected $fillable = [
        'cantidad_clientes','temporada','tipo',
    ];
}
