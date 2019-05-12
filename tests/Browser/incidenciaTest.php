<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Incidencia;
use App\User;

class incidenciaTest extends DuskTestCase
{


    /**
     * Test dusk proba incidencia sense fallos
     * @test
     * @return void
     */

    public function test_usuari_envia_incidencia()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->clickLink('Entrar')
                ->assertSee('Iniciar sessió')
                ->value('input[name="email"]', 'pacoramon@univeylandia-parc.cat')
                ->value('input[name="password"]', 'Alumne123')
                ->press('button[type="submit"]')
                ->visit('/gestio/incidencies/create')
                ->assertSee('Crear')
                ->type('input[name="title"]', 'Lavabos trencats')
                ->type('textarea[name="description"]', 'Hi ha una fuga als lavabos collons')
                ->select('select[name="priority"]', 'Botiga')
                ->press('button[type="submit"]')
                ->visit('/')
                ->clickLink('Paco Ramon')
                ->clickLink('Sortir');
        });
    }

    /**
     * Test dusk proba incidencia amb fallos
     * @test
     * @return void
     */

    public function test_usuari_envia_incidencia_falla()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->clickLink('Entrar')
                ->assertSee('Iniciar sessió')
                ->value('input[name="email"]', 'pacoramon@univeylandia-parc.cat')
                ->value('input[name="password"]', 'Alumne123')
                ->press('button[type="submit"]')
                ->visit('/gestio/incidencies/create')
                ->assertSee('Crear')
                ->type('textarea[name="description"]', 'Hi ha una fuga als lavabos collons')
                ->select('select[name="priority"]', 'Botiga')
                ->press('button[type="submit"]');
        });
    }
}
