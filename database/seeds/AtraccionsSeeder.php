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
            'nom_atraccio' => 'Dragon Khan',
            'tipus_atraccio' => '1',
            'data_inauguracio' => '2019-03-12',
            'altura_min' => '130',
            'altura_max' => '300',
            'accessibilitat' => '1',
            'acces_express' => '1',
            'descripcio' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nec ligula est. Sed vitae ligula finibus, euismod odio sed, volutpat sem. Proin tincidunt nunc nisl, sit amet aliquam leo elementum ac. Maecenas eros mauris, posuere id faucibus id, elementum tincidunt enim.',
            'path' => '/storage/atraccions/atraccio_general.jpg',
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
            'descripcio' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nec ligula est. Sed vitae ligula finibus, euismod odio sed, volutpat sem. Proin tincidunt nunc nisl, sit amet aliquam leo elementum ac. Maecenas eros mauris, posuere id faucibus id, elementum tincidunt enim.',
            'path' => '/storage/atraccions/atraccio_general.jpg',
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
            'descripcio' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nec ligula est. Sed vitae ligula finibus, euismod odio sed, volutpat sem. Proin tincidunt nunc nisl, sit amet aliquam leo elementum ac. Maecenas eros mauris, posuere id faucibus id, elementum tincidunt enim.',
            'path' => '/storage/atraccions/atraccio_general.jpg',
            'votacions' => 8,
        ]);
     }
}
