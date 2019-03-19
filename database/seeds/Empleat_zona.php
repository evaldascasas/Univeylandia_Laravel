<?php

use Illuminate\Database\Seeder;

class Empleat_zona extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('empleat_zona')->insert([
          'id_zona' => '1',
          'id_empleat' => '11',
          'data_inici' => '2019-12-18',
          'data_fi' => '2019-12-20',
      ]);

    }
}
