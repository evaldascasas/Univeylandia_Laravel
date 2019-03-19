<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolsTableSeeder::class,
            HorarisTableSeeder::class,
            DadesEmpleatSeeder::class,
            UsersTableSeeder::class,
            EstatIncidenciesTableSeeder::class,
            ServeisSeeder::class,
            TipusPrioritatTableSeeder::class,
            TipusAtraccionsTableSeeder::class,
            AtraccionsSeeder::class,
            TipusProducteSeeder::class,
            ZonesSeeder::class,
            Empleat_zona::class,
            CategoriesSeeder::class,
            PromocionsSeeder::class,
            TipusProducteSeeder::class,
			NoticiesSeeder::class,
        ]);
    }
}
