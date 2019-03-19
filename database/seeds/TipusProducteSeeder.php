<?php

use Illuminate\Database\Seeder;

class TipusProducteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipus_producte')->insert([
            'nom' => 'Ticket general adult',
            'preu_base' => '20'
        ]);

        DB::table('tipus_producte')->insert([
            'nom' => 'Ticket general xiquet',
            'preu_base' => '15'
        ]);

        DB::table('tipus_producte')->insert([
            'nom' => 'Ticket general nado',
            'preu_base' => '0'
        ]);

        DB::table('tipus_producte')->insert([
            'nom' => 'Ticket express adult',
            'preu_base' => '30'
        ]);

        DB::table('tipus_producte')->insert([
            'nom' => 'Ticket express xiquet',
            'preu_base' => '25'
        ]);

        DB::table('tipus_producte')->insert([
            'nom' => 'Ticket viatges adult',
            'preu_base' => '10'
        ]);

        DB::table('tipus_producte')->insert([
            'nom' => 'Ticket viatges xiquet',
            'preu_base' => '7'
        ]);

        DB::table('tipus_producte')->insert([
            'nom' => 'foto',
            'preu_base' => '5'
        ]);

    }
}
