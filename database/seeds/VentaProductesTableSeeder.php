<?php

use Illuminate\Database\Seeder;

class VentaProductesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('venta_productes')->insert([
          'id_usuari' => '1',
          'preu_total' => '60',
          'factura_pdf_path' => 'res',
          'estat' => '1',
      ]);
      
    }
}
