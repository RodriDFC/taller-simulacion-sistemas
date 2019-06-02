<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $fillable = [
        'servicio','exigencia','costo'
    ];
    public function clientes(){
        return $this->belongsToMany(Servicio::class);
    }
}
