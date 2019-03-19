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
        DB::table('dades_empleats')->insert([
            'codi_seg_social' => 'CODISS123456789',
            'num_nomina' => 'N123465789',
            'IBAN' => 'IBAN123456789',
            'especialitat' => 'IT',
            'carrec' => 'Administrador',
            'data_inici_contracte' => '2019-09-06',
            'data_fi_contracte' => '2020-09-06',
            'id_horari' => 1,
        ]);

        DB::table('dades_empleats')->insert([
            'codi_seg_social' => 'codi2',
            'num_nomina' => 'num2',
            'IBAN' => 'IBAN12345a89',
            'especialitat' => 'IZ',
            'carrec' => 'General',
            'data_inici_contracte' => '2019-09-06',
            'data_fi_contracte' => '2020-09-06',
            'id_horari' => 1,
        ]);

        DB::table('dades_empleats')->insert([
            'codi_seg_social' => 'codi3',
            'num_nomina' => 'num3',
            'IBAN' => 'IBAN12345a89',
            'especialitat' => 'IZ',
            'carrec' => 'Manteniment',
            'data_inici_contracte' => '2019-09-06',
            'data_fi_contracte' => '2020-09-06',
            'id_horari' => 1,
        ]);

        DB::table('dades_empleats')->insert([
            'codi_seg_social' => 'codi4',
            'num_nomina' => 'num4',
            'IBAN' => 'IBAN12345sdsda89',
            'especialitat' => 'IZ',
            'carrec' => 'Neteja',
            'data_inici_contracte' => '2019-09-06',
            'data_fi_contracte' => '2020-09-06',
            'id_horari' => 1,
        ]);
        
    }
}
