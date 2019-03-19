<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,9) as $index) {
            DB::table('users')->insert([
                'nom' => $faker->firstName,
                'cognom1' => $faker->lastName,
                'cognom2' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
                'data_naixement' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'adreca' => $faker->streetAddress,
                'ciutat' => $faker->city,
                'provincia' => $faker->state,
                'codi_postal' => $faker->postcode,
                'tipus_document' => 'DNI',
                'numero_document' => '-',
                'sexe' => $faker->title,
                'telefon' => $faker->phoneNumber,
                'id_rol' => 1,
                'id_dades_empleat' => null,
                'actiu' => 0,
                'remember_token' => str_random(10)
            ]);
        }
        DB::table('users')->insert([
            'nom' => 'Paco',
            'cognom1' => 'Ramon',
            'cognom2' => null,
            'email' => 'pacoramon@univeylandia-parc.cat',
            'email_verified_at' => now(),
            'password' => Hash::make('Alumne123'),
            'data_naixement' => '1995-09-06',
            'adreca' => 'Calle Piruleta 25',
            'ciutat' => 'Amposta',
            'provincia' => 'Tarragona',
            'codi_postal' => '43870',
            'tipus_document' => 'DNI',
            'numero_document' => '47481130Z',
            'sexe' => 'Home',
            'telefon' => '657337571',
            'id_rol' => 2,
            'id_dades_empleat' => 1,
            'actiu' => 1,
            'remember_token' => null
        ]);

        DB::table('users')->insert([
            'nom' => 'Dalasito',
            'cognom1' => 'Pambisito',
            'cognom2' => null,
            'email' => 'dalasito@univeylandia-parc.cat',
            'email_verified_at' => now(),
            'password' => Hash::make('alumne'),
            'data_naixement' => '1995-09-06',
            'adreca' => 'Calle Piruleta 25',
            'ciutat' => 'Amposta',
            'provincia' => 'Tarragona',
            'codi_postal' => '43870',
            'tipus_document' => 'DNI',
            'numero_document' => '47481130Z',
            'sexe' => 'Home',
            'telefon' => '657337571',
            'id_rol' => 5,
            'id_dades_empleat' => 2,
            'actiu' => 1,
            'remember_token' => null
        ]);
    
        DB::table('users')->insert([
            'nom' => 'Miare',
            'cognom1' => 'Pambisita',
            'cognom2' => null,
            'email' => 'miare@univeylandia-parc.cat',
            'email_verified_at' => now(),
            'password' => Hash::make('alumne'),
            'data_naixement' => '1995-09-06',
            'adreca' => 'Calle Piruleta 25',
            'ciutat' => 'Amposta',
            'provincia' => 'Tarragona',
            'codi_postal' => '43870',
            'tipus_document' => 'DNI',
            'numero_document' => '47481130Z',
            'sexe' => 'Home',
            'telefon' => '657337571',
            'id_rol' => 3,
            'id_dades_empleat' => 3,
            'actiu' => 1,
            'remember_token' => null
        ]);

        DB::table('users')->insert([
            'nom' => 'wismichu',
            'cognom1' => 'owo',
            'cognom2' => null,
            'email' => 'wismichu@univeylandia-parc.cat',
            'email_verified_at' => now(),
            'password' => Hash::make('alumne'),
            'data_naixement' => '1995-09-06',
            'adreca' => 'Calle Piruleta 25',
            'ciutat' => 'Amposta',
            'provincia' => 'Tarragona',
            'codi_postal' => '43870',
            'tipus_document' => 'DNI',
            'numero_document' => '47481130Z',
            'sexe' => 'Home',
            'telefon' => '657337571',
            'id_rol' => 4,
            'id_dades_empleat' => 4,
            'actiu' => 1,
            'remember_token' => null
        ]);
    }
}
