<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'nom' => $faker->firstName,
        'cognom1' => $faker->lastName,
        'cognom2' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'data_naixement' => $faker->date($format = 'Y-m-d', $max = '2000-01-01'),
        'adreca' => $faker->streetAddress,
        'ciutat' => $faker->city,
        'provincia' => $faker->state,
        'codi_postal' => $faker->postcode,
        'tipus_document' => $faker->randomElement(['DNI' ,'NIE']),
        'numero_document' => $faker->dni,
        'sexe' => $faker->randomElement(['Home' ,'Dona']),
        'telefon' => $faker->phoneNumber,
        'id_rol' => $faker->numberBetween(3, 8),
        'id_dades_empleat' => null,
        'remember_token' => str_random(10)
    ];
});
