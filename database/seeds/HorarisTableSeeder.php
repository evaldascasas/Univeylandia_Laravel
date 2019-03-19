<?php

use Illuminate\Database\Seeder;

class HorarisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('horaris')->insert([
            'torn' => 'Mati'
        ]);

        DB::table('horaris')->insert([
            'torn' => 'Tarda'
        ]);

        DB::table('horaris')->insert([
            'torn' => 'Nit'
        ]);
    }
}
