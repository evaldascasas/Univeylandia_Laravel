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
            'descripcio' => "L'atraccio mes espectacular de tot el parc d'Univeylandia, un montanya russa amb tres loops que et deixaran una experiencia per a tota vida.",
            'path' => '/public/img/atraccions/atraccio1.jpg',
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
            'descripcio' => "El Tornado es una atraccio que et fa sentir la sensacio d'estar dins d'un tornado de el Oest del continent America.",
            'path' => '/public/img/atraccions/atraccio2.jpg',
            'votacions' => 20,
        ]);
        
        DB::table('atraccions')->insert([
            'nom_atraccio' => 'Cañon V',
            'tipus_atraccio' => '3',
            'data_inauguracio' => '2019-03-22',
            'altura_min' => '90',
            'altura_max' => '300',
            'accessibilitat' => '0',
            'acces_express' => '1',
            'descripcio' => " El Cañon V es la unica atraccio d'aigua del nostr parc, aquesta atraccio et porta per dins dels cañons del Oest.",
            'path' => '/public/img/atraccions/atraccio3.jpg',
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
            'descripcio' => " El Vasin es l'atraccio per als nens mes petits que ens visitin en el parc, es una atraccio apta per a tota la familia.",
            'path' => '/public/img/atraccions/atraccio4.jpg',
            'votacions' => 8,
        ]);
     }
}
