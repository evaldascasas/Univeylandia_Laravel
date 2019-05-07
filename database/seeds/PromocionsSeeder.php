<?php

use Illuminate\Database\Seeder;

class PromocionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promocions')->insert([
            'titol' => 'Promoció Nadal 2019',
            'descripcio' => '
                          <p>
                          Aquest Nadal si vens al parc amb més de dues persones et fem un descompte del 25%!
                          </p>
                          ',
            'id_usuari' => 1,
            'path_img' => '/storage/promocions/promocio1.jpg'
        ]);

        DB::table('promocions')->insert([
            'titol' => 'DESCOBREIX ELS NOSTRES PACKS D\'ENTRADES',
            'descripcio' => '
                          <p>
                          Amb les nostres tipologies d\'entrades de dies consecutius i combinades podràs gaudir de totes les nostres atraccions.
                          </p>
                          ',
            'id_usuari' => 1,
            'path_img' => '/storage/promocions/promocio2.png'
        ]);


    }
}
