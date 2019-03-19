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
            'nom' => 'Mediterrania',
        ]);

        DB::table('zones')->insert([
            'nom' => 'Mexico',
        ]);

        DB::table('zones')->insert([
            'nom' => 'Jamaica',
        ]);
    }
}
