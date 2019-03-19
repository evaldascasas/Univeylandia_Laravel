<?php

use Illuminate\Database\Seeder;

class TipusAtraccionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipus_atraccions')->insert([
            'tipus' => 'Extrema'
        ]);

        DB::table('tipus_atraccions')->insert([
            'tipus' => 'Mitjana'
        ]);

        DB::table('tipus_atraccions')->insert([
            'tipus' => 'Familiar'
        ]);
    }
}
