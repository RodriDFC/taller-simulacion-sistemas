<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TablaSimulacion extends Model
{
    protected $table = 'tabla_simulacion';
    public $timestamps = false;
    protected $fillable = [
        'id', 'numero_cliente', 'tipo_cliente','servicios', 'hospedado', 'pago', 'total_ganacia','simulacion_id','pago','total_ganancia'
    ];
}
