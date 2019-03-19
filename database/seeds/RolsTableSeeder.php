<?php

use Illuminate\Database\Seeder;

class RolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rols')->insert([
            'nom_rol' => 'Client'
        ]);

        DB::table('rols')->insert([
            'nom_rol' => 'Gerent'
        ]);

        DB::table('rols')->insert([
            'nom_rol' => 'Manteniment'
        ]);

        DB::table('rols')->insert([
            'nom_rol' => 'Neteja'
        ]);

        DB::table('rols')->insert([
            'nom_rol' => 'Treballador General'
        ]);
    }
}
