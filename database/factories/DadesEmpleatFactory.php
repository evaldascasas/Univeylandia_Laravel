<?php

use Faker\Generator as Faker;

$factory->define(App\DadesEmpleat::class, function (Faker $faker) {
    return [
        'codi_seg_social' => $faker->numberBetween(1000000, 9999999),
        'num_nomina' => $faker->vat,
        'IBAN' => $faker->iban('ES'),
        'especialitat' => $faker->bs,
        'carrec' => $faker->randomElement(['IT','Manteniment','Neteja','Show','Atenció al client','Treballador General','Seguretat']),
        'data_inici_contracte' => $faker->date('Y-m-d', '2015-01-01'),
        'data_fi_contracte' => $faker->date('Y-m-d', '2020-01-01'),
        'id_horari' => $faker->numberBetween(1, 3),
    ];
});
