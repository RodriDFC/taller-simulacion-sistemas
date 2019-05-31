<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Simulacion extends Model
{
    protected $fillable = [
        'habitaciones_construir','temporada','clientes_simulados_economica','clientes_simulados_negocios','clientes_simulados_ejecutiva','clientes_simulados_premium','lapso_simulacion'
    ];
    public function servicios(){
        return $this->belongsToMany(Servicio::class);
    }
    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }

}
