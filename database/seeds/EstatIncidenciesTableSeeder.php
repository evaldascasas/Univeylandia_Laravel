<?php

use Illuminate\Database\Seeder;

class EstatIncidenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estat_incidencies')->insert([
            'nom_estat' => 'To-do'
        ]);

        DB::table('estat_incidencies')->insert([
            'nom_estat' => 'In progress'
        ]);

        DB::table('estat_incidencies')->insert([
            'nom_estat' => 'Done'
        ]);
    }
}
