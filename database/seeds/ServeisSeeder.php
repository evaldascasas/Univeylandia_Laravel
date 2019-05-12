<?php

use Illuminate\Database\Seeder;

class ServeisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('serveis')->insert([
            'nom' => 'Neteja'
        ]);

        DB::table('serveis')->insert([
            'nom' => 'Manteniment'
        ]);

        DB::table('serveis')->insert([
            'nom' => 'Atenció al client'
        ]);

        DB::table('serveis')->insert([
            'nom' => 'Show'
        ]);

        DB::table('serveis')->insert([
            'nom' => 'Seguretat'
        ]);
    }
}
