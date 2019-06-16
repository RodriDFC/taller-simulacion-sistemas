<?php

use App\Habitacion;
use Illuminate\Database\Seeder;

class habitacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Habitacion::create([
            'id'=>1,
            'cantidad_habitaciones' => 20,
            'tipo_habitacion' => 'economica',
            'precio_habitacion'=> 78
        ]);
        Habitacion::create([
            'id'=>2,
            'cantidad_habitaciones' => 20,
            'tipo_habitacion' => 'negocios',
            'precio_habitacion'=> 97
        ]);
        Habitacion::create([
            'id'=>3,
            'cantidad_habitaciones' => 20,
            'tipo_habitacion' => 'ejecutiva',
            'precio_habitacion'=> 120
        ]);
        Habitacion::create([
            'id'=>4,
            'cantidad_habitaciones' => 10,
            'tipo_habitacion' => 'premium',
            'precio_habitacion'=> 180
        ]);
    }
}
