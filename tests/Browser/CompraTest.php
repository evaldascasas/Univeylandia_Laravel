<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CompraTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_comprar_ticket()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/entrades')
                    ->assertSee('Ticket general adult')
                    ->assertSee('1')
                    ->click('button[type="submit"]');
        });
    }
/*
    public function test_veure_compra()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/cistella')
            ->assertSee('Cistella')
            ->assertSee('Ticket general adult');
        });
    }

    public function test_plenar_formulari()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/compra')
            ->assertSee('Paco')
            ->value('input[name="titular"]', 'Ferran Climent Vidal')
            ->value('input[name="ccNum"]', '5305181663268265')
            ->value('input[name="targeta_codi_secret"]', '608')
            ->click('button[type="submit"]');
        });
    } */
}
