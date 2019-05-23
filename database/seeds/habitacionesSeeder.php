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
        ]);
        Habitacion::create([
            'id'=>2,
            'cantidad_habitaciones' => 20,
            'tipo_habitacion' => 'negocios',
        ]);
        Habitacion::create([
            'id'=>3,
            'cantidad_habitaciones' => 20,
            'tipo_habitacion' => 'ejecutiva',
        ]);
        Habitacion::create([
            'id'=>4,
            'cantidad_habitaciones' => 10,
            'tipo_habitacion' => 'premium',
        ]);
    }
}
