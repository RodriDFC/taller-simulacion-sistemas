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
        ]);
        Servicio::create([
            'id'=>2,
            'servicio' => 'TV-cable',
        ]);
        Servicio::create([
            'id'=>3,
            'servicio' => 'limpieza diaria',
        ]);
        Servicio::create([
            'id'=>4,
            'servicio' => 'Baño privado',
        ]);
        Servicio::create([
            'id'=>5,
            'servicio' => 'Sala Conferencias',
        ]);
        Servicio::create([
            'id'=>6,
            'servicio' => 'Centro de negocios',
        ]);
        Servicio::create([
            'id'=>7,
            'servicio' => 'Restaurant y Bar',
        ]);
        Servicio::create([
            'id'=>8,
            'servicio' => 'Atencion Personalizada',
        ]);
        Servicio::create([
            'id'=>9,
            'servicio' => 'Balneario',
        ]);
        Servicio::create([
            'id'=>10,
            'servicio' => 'Gimnasio',
        ]);
    }
}
