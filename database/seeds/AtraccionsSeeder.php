<?php

use Illuminate\Database\Seeder;

class AtraccionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
        DB::table('atraccions')->insert([
            'nom_atraccio' => 'Dragon Stratus',
            'tipus_atraccio' => '1',
            'data_inauguracio' => '2019-03-12',
            'altura_min' => '130',
            'altura_max' => '300',
            'accessibilitat' => '1',
            'acces_express' => '1',
            'descripcio' => "L'atracció més espectacular de tot el parc d'Univeylandia, un montanya russa amb tres loops que et deixaran una experiència per a tota la vida.",
            'path' => '/img/atraccions/atraccio1.jpg',
            'votacions' => 20,
        ]);

        DB::table('atraccions')->insert([
            'nom_atraccio' => 'Tornado',
            'tipus_atraccio' => '2',
            'data_inauguracio' => '2019-03-21',
            'altura_min' => '100',
            'altura_max' => '200',
            'accessibilitat' => '1',
            'acces_express' => '0',
            'descripcio' => "El Tornado és una atracció que et fa sentir la sensació d'estar dins d'un tornado de l'Oest del continent Americà.",
            'path' => '/img/atraccions/atraccio2.jpg',
            'votacions' => 20,
        ]);
        
        DB::table('atraccions')->insert([
            'nom_atraccio' => 'West Canyon',
            'tipus_atraccio' => '3',
            'data_inauguracio' => '2019-03-22',
            'altura_min' => '90',
            'altura_max' => '300',
            'accessibilitat' => '0',
            'acces_express' => '1',
            'descripcio' => "És la unica atraccio d'aigua del nostre parc, aquesta atracció et porta per dins dels canyons de l'Oest.",
            'path' => '/img/atraccions/atraccio3.jpg',
            'votacions' => 8,
        ]);

        DB::table('atraccions')->insert([
            'nom_atraccio' => 'Vasin',
            'tipus_atraccio' => '3',
            'data_inauguracio' => '2019-03-23',
            'altura_min' => '50',
            'altura_max' => '300',
            'accessibilitat' => '0',
            'acces_express' => '1',
            'descripcio' => " L'atracció per als nens més petits que vinguin al parc, és una atracció apta per a tota la familia.",
            'path' => '/img/atraccions/atraccio4.jpg',
            'votacions' => 8,
        ]);
     }
}
