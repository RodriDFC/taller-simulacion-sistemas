<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $fillable = [
        'servicio'
    ];
    public function clientes(){
        return $this->belongsToMany(Servicio::class);
    }
}
