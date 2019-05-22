<?php

use App\Servicio;
use Illuminate\Database\Seeder;

class serviciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Servicio::create([
            'id'=>1,
            'servicio' => 'WiFi',
            'costo' => 20,
        ]);
        Servicio::create([
            'id'=>2,
            'servicio' => 'TV-cable',
            'costo' => 15,
        ]);
        Servicio::create([
            'id'=>3,
            'servicio' => 'limpieza diaria',
            'costo' => 10,
        ]);
        Servicio::create([
            'id'=>4,
            'servicio' => 'Baño privado',
            'costo' => 10,
        ]);
        Servicio::create([
            'id'=>5,
            'servicio' => 'Sala Conferencias',
            'costo' => 25,
        ]);
        Servicio::create([
            'id'=>6,
            'servicio' => 'Centro de negocios',
            'costo' => 30,
        ]);
        Servicio::create([
            'id'=>7,
            'servicio' => 'Restaurant y Bar',
            'costo' => 25,
        ]);
        Servicio::create([
            'id'=>8,
            'servicio' => 'Atencion Personalizada',
            'costo' => 35,
        ]);
        Servicio::create([
            'id'=>9,
            'servicio' => 'Balneario',
            'costo' => 25,
        ]);
        Servicio::create([
            'id'=>10,
            'servicio' => 'Gimnasio',
            'costo' => 20,
        ]);
    }
}
