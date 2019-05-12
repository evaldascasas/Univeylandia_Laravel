<?php

use Illuminate\Database\Seeder;

class ZonesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('zones')->insert([
            'nom' => 'Españita',
        ]);

        DB::table('zones')->insert([
            'nom' => 'Mèxic',
        ]);

        DB::table('zones')->insert([
            'nom' => 'Polinesia',
        ]);

        DB::table('zones')->insert([
            'nom' => 'Xina',
        ]);

        DB::table('zones')->insert([
            'nom' => 'Otaku',
        ]);

        DB::table('zones')->insert([
            'nom' => 'Far West',
        ]);
    }
}
