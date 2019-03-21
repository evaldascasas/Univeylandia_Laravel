<?php

use Illuminate\Database\Seeder;

class NoticiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('noticies')->insert([
            'titol' => 'Tancament 20/03/2019',
            'descripcio' => 'El parc tancarà el día 20/03/2019 per la exposició de la presentació del sprint 4',
            'id_usuari' => 10,
            'categoria' => 1,
            'path_img' => '/storage/noticies/tancat.jpg',
        ]);

        DB::table('noticies')->insert([
            'titol' => 'Nova atracció!',
            'descripcio' => 'El dia 23/05/2019 inaugurarem una nova atracció anomenada Furious Agramunt. Aquesta atracció posarà a prova als més valents, passant de 0 a 150 km/h en tan sols 2 segons. L\'atracció té un recorregut que llista gairebé tocant el terra.No t\'ho perdis!',
            'id_usuari' => 10,
            'categoria' => 2,
            'path_img' => '/storage/noticies/furiousAgramunt.jpg',
        ]);

        DB::table('noticies')->insert([
            'titol' => 'Decoració de nadal',
            'descripcio' => 'La decoració de nadal estarà disponible a partir del 20/03/2019, toca celebrar la finalització del sprint! :)',
            'id_usuari' => 10,
            'categoria' => 1,
            'path_img' => '/storage/noticies/nadal.jpg',
        ]);
    }
}
