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
        //Create clients
        factory(\App\User::class, 20)->create([
            'id_rol' => 1,
            'id_dades_empleat' => null
        ]);

        //Create Admin
        factory(\App\User::class)->create([
            'nom' => 'Paco',
            'cognom1' => 'Ramon',
            'email' => 'pacoramon@univeylandia-parc.cat',
            'email_verified_at' => now(),
            'password' => Hash::make('Alumne123'),
            'data_naixement' => '1995-09-06',
            'adreca' => 'Calle Piruleta 25',
            'ciutat' => 'Amposta',
            'provincia' => 'Tarragona',
            'codi_postal' => '43870',
            'sexe' => 'Home',
            'id_rol' => 2,
            'id_dades_empleat' => 1,
            'remember_token' => null
        ]);

        //Create employees
        factory(\App\User::class)->create([
            'nom' => 'Dalasito',
            'cognom1' => 'Pambisito',
            'cognom2' => null,
            'email' => 'dalasito@univeylandia-parc.cat',
            'email_verified_at' => now(),
            'password' => Hash::make('alumne'),
            'adreca' => 'Calle Piruleta 25',
            'ciutat' => 'Amposta',
            'provincia' => 'Tarragona',
            'codi_postal' => '43870',
            'sexe' => 'Home',
            'id_rol' => 5,
            'id_dades_empleat' => 2,
            'remember_token' => null
        ]);
    
        factory(\App\User::class)->create([
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
            'id_rol' => 3,
            'id_dades_empleat' => 3,
            'remember_token' => null
        ]);

        factory(\App\User::class)->create([
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
            'sexe' => 'Home',
            'id_rol' => 4,
            'id_dades_empleat' => 4,
            'remember_token' => null
        ]);
    }
}
