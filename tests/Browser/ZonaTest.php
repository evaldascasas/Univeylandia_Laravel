<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ZonaTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_crearZona()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->clickLink('Entrar')
                ->assertSee('Iniciar sessió')
                ->value('input[name="email"]', 'pacoramon@univeylandia-parc.cat')
                ->value('input[name="password"]', 'Alumne123')
                ->click('button[type="submit"]')
                ->visit('/gestio/zones/create')
                ->value('input[name="nom"]', 'TerrorShow')
                ->click('button[type="submit"]')
                ->visit('/')
                ->clickLink('Paco Ramon')
                ->clickLink('Sortir');
        });
    }

    public function test_crearZona_erroni()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->clickLink('Entrar')
                ->assertSee('Iniciar sessió')
                ->value('input[name="email"]', 'pacoramon@univeylandia-parc.cat')
                ->value('input[name="password"]', 'Alumne123')
                ->click('button[type="submit"]')
                ->visit('/gestio/zones/create')
                //->value('input[name="nom"]', 'TerrorShow')
                ->click('button[type="submit"]')
                ->visit('/')
                ->clickLink('Paco Ramon')
                ->clickLink('Sortir');
        });
    }
    
}
