<?php

use Illuminate\Database\Seeder;

class DadesEmpleatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\DadesEmpleat::class)->create([
            'codi_seg_social' => 'CODISS123456789',
            'num_nomina' => 'N123465789',
            'IBAN' => 'IBAN123456789',
            'especialitat' => 'IT',
            'carrec' => 'Administrador',
            'data_inici_contracte' => '2015-09-06',
            'data_fi_contracte' => '2020-09-06',
            'id_horari' => 1,
        ]);

        factory(\App\DadesEmpleat::class)->create([
            'especialitat' => 'General',
            'carrec' => 'General',
            'data_inici_contracte' => '2019-09-06',
            'data_fi_contracte' => '2020-09-06',
            'id_horari' => 3,
        ]);

        factory(\App\DadesEmpleat::class)->create([
            'especialitat' => 'Manteniment',
            'carrec' => 'Manteniment',
            'data_inici_contracte' => '2019-09-06',
            'data_fi_contracte' => '2020-09-06',
            'id_horari' => 2,
        ]);

        factory(\App\DadesEmpleat::class)->create([
            'especialitat' => 'Neteja',
            'carrec' => 'Neteja',
            'data_inici_contracte' => '2019-09-06',
            'data_fi_contracte' => '2020-09-06',
            'id_horari' => 1,
        ]);

        // Create employees
        factory(\App\DadesEmpleat::class, 30)->create([]);

        // Create admins
        factory(\App\DadesEmpleat::class, 10)->create([
            'carrec' => 'Administrador',
        ]);
        
    }
}
