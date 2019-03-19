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
            'path_img' => '/storage/noticies/test.png',
        ]);

        DB::table('noticies')->insert([
            'titol' => 'Nova atracció! Dragon khan',
            'descripcio' => 'Dragon Khan es una montaña rusa de PortAventura Park. Es la segunda atracción más famosa del parque después de la montaña rusa Shambhala. El parque está ubicado en Salou y Vilaseca, municipios de Tarragona, Cataluña, España. Fue inaugurada el 1 de mayo de 1995 por el presidente de la Generalidad de Cataluña Jordi Pujol, acompañado por el ministro de Comercio y Turismo de España Javier Gómez Navarro',
            'id_usuari' => 10,
            'categoria' => 2,
            'path_img' => '/storage/noticies/test.png',
        ]);

        DB::table('noticies')->insert([
            'titol' => 'Decoració de nadal',
            'descripcio' => 'La decoració de nadal estarà disponible a partir del 20/03/2019, toca celebrar la finalització del sprint! :)',
            'id_usuari' => 10,
            'categoria' => 1,
            'path_img' => '/storage/noticies/test.png',
        ]);
    }
}
