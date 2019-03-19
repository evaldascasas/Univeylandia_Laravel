<?php

use Illuminate\Database\Seeder;

class TipusPrioritatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipus_prioritat')->insert([
            'nom_prioritat' => 'Baixa'
        ]);

        DB::table('tipus_prioritat')->insert([
            'nom_prioritat' => 'Normal'
        ]);
        
        DB::table('tipus_prioritat')->insert([
            'nom_prioritat' => 'Urgent'
        ]);
    }
}
