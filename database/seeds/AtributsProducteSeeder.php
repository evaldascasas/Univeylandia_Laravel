<?php

use Illuminate\Database\Seeder;

class AtributsProducteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('atributs_producte')->insert([
            'nom' => '2',
            'mida' => '',
            'tickets_viatges' => '100',
            'foto_path' => 'storage/productes/1.png',
            'foto_path_aigua' => '',
            'thumbnail' => '',
            'preu' => '20',
            'id_atraccio' => null,
            'data_entrada' => null,
        ]);
 
        DB::table('atributs_producte')->insert([
            'nom' => '4',
            'mida' => '',
            'tickets_viatges' => '100',
            'foto_path' => 'storage/productes/2.png',
            'foto_path_aigua' => '',
            'thumbnail' => '',
            'preu' => '30',
            'id_atraccio' => null,
            'data_entrada' => null,
        ]);
 
        DB::table('atributs_producte')->insert([
            'nom' => '6',
            'mida' => '',
            'tickets_viatges' => '3',
            'foto_path' => 'storage/productes/3.png',
            'foto_path_aigua' => '',
            'thumbnail' => '',
            'preu' => '10',
            'id_atraccio' => null,
            'data_entrada' => null,
        ]);
    }
}
