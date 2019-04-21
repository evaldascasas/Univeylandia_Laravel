<?php

use Illuminate\Database\Seeder;

class ProducteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productes')->insert([
            'atributs' => '1',
            'descripcio' => 'Ticket general xiquet',
            'estat' => '1'
        ]);
 
        DB::table('productes')->insert([
            'atributs' => '2',
            'descripcio' => 'Ticket express adult',
            'estat' => '1'
        ]);
 
        DB::table('productes')->insert([
            'atributs' => '3',
            'descripcio' => 'Ticket viatges adult',
            'estat' => '1'
        ]);
    }
}
