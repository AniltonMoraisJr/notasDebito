<?php

use Illuminate\Database\Seeder;

class TipoDespesaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_despesa')->insert([
            ['nome' => 'Passagem Aérea',
            'codigo' => '10101'],
            ['nome' => 'Telefonemas',
            'codigo' => '10102'],
            ['nome' => 'Jantar',
            'codigo' => '10103'],
            ['nome' => 'Hotel',
            'codigo' => '10104'],
            ['nome' => 'Extras Hotel',
            'codigo' => '10105'],
            ['nome' => 'Almoço',
            'codigo' => '10106'],
            ['nome' => 'Estacionamento',
            'codigo' => '10107'],
            ['nome' => 'Correio',
            'codigo' => '10108'],
            ['nome' => 'Taxi / Condução',
            'codigo' => '10109'],
            ['nome' => 'Pedágio',
            'codigo' => '10110'],
            ['nome' => 'Café da manhã',
            'codigo' => '10111'],
            ['nome' => 'Quilometragem',
            'codigo' => '10112'],
            ['nome' => 'Cartório',
            'codigo' => '10113'],
            ['nome' => 'Outras',
            'codigo' => '10114']
        ]);

    }
}
