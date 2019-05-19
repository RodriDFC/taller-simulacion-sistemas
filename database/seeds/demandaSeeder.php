<?php

use App\Demanda;
use Illuminate\Database\Seeder;

class demandaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Demanda::create([
            'id'=>1,
            'cantidad_clientes' => '17',//5
            'tipo' => 'economica',
            'temporada' => null
        ]);
        Demanda::create([
            'id'=>2,
            'cantidad_clientes' => '14',//0
            'tipo' => 'negocios',
            'temporada' => null
        ]);
        Demanda::create([
            'id'=>3,
            'cantidad_clientes' => '11',//5
            'tipo' => 'ejecutiva',
            'temporada' => null
        ]);
        Demanda::create([
            'id'=>4,
            'cantidad_clientes' => '7',//5
            'tipo' => 'premium',
            'temporada' => null
        ]);

        Demanda::create([
            'id'=>5,
            'cantidad_clientes' => '24',//0
            'tipo' => 'economica',
            'temporada' => 'alta'
        ]);
        Demanda::create([
            'id'=>6,
            'cantidad_clientes' => '19',//0
            'tipo' => 'negocios',
            'temporada' => 'alta'
        ]);
        Demanda::create([
            'id'=>7,
            'cantidad_clientes' => '16',//0
            'tipo' => 'ejecutiva',
            'temporada' => 'alta'
        ]);
        Demanda::create([
            'id'=>8,
            'cantidad_clientes' => '10',//0
            'tipo' => 'premium',
            'temporada' => 'alta'
        ]);
        Demanda::create([
            'id'=>9,
            'cantidad_clientes' => '13',//0
            'tipo' => 'economica',
            'temporada' => 'baja'
        ]);
        Demanda::create([
            'id'=>10,
            'cantidad_clientes' => '10',//0
            'tipo' => 'negocios',
            'temporada' => 'baja'
        ]);
        Demanda::create([
            'id'=>11,
            'cantidad_clientes' => '8',//5
            'tipo' => 'ejecutiva',
            'temporada' => 'baja'
        ]);
        Demanda::create([
            'id'=>12,
            'cantidad_clientes' => '5',//5
            'tipo' => 'premium',
            'temporada' => 'baja'
        ]);
    }
}
