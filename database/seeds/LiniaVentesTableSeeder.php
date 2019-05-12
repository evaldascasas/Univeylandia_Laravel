<?php

use Illuminate\Database\Seeder;

class LiniaVentesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('linia_ventes')->insert([
            'id_venta' => '1',
            'producte' => '1',
            'quantitat' => '1',
        ]);

        DB::table('linia_ventes')->insert([
            'id_venta' => '1',
            'producte' => '2',
            'quantitat' => '1',
        ]);

        DB::table('linia_ventes')->insert([
            'id_venta' => '1',
            'producte' => '3',
            'quantitat' => '1',
        ]);
    }
}
