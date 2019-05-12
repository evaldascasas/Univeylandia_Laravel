<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str as Str;

class PromocionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slug = Str::slug('Descomptes d\'estiu');

        DB::table('promocions')->insert([
            'titol' => 'Descomptes d\'estiu',
            'descripcio' => '
                          <p>
                          Aquest estiu si vens al parc amb més de dues persones et fem un descompte del 25%!
                          </p>
                          ',
            'id_usuari' => 1,
            'path_img' => '/storage/promocions/promocio1.jpg',
            'slug' => $slug
        ]);

        $slug = Str::slug('Descobreix els nostres paquets d\'entrades');

        DB::table('promocions')->insert([
            'titol' => 'Descobreix els nostres paquets d\'entrades',
            'descripcio' => '
                          <p>
                          Amb les nostres tipologies d\'entrades de dies consecutius i combinades podràs gaudir de totes les nostres atraccions.
                          </p>
                          ',
            'id_usuari' => 1,
            'path_img' => '/storage/promocions/promocio2.png',
            'slug' => $slug
        ]);
    }
}
