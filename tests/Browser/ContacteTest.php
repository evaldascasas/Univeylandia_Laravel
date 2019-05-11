<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ContacteTest extends DuskTestCase
{
    /**
     * Test de enviar un tiket
     *
     * @test
     * @return void
     */
     public function usuari_envia_contacte()
     {
         $this->browse(function (Browser $browser) {
             $browser->visit('/contacte')
                     ->assertSee('Contacta')
                     ->type('nom', 'Paco')
                     ->type('email', 'ivanmorte3@iesmontsia.org')
                     ->select('tipus_pregunta', 'Botiga')
                     ->type('consulta', 'hola, no entenc el funcionament')
                     ->check('checkE')
                     ->press('Submit');
         });
    }

    /**
     * Test de enviar un tiket i falla
     * @test
     * @return [type] [description]
     */

     public function usuari_envia_contacte_falla()
     {
         $this->browse(function (Browser $browser) {
             $browser->visit('/contacte')
                     ->assertSee('Contacta')
                     ->type('email', 'ivanmorte3@iesmontsia.org')
                     ->select('tipus_pregunta', 'Botiga')
                     ->type('consulta', 'hola, no entenc el funcionament')
                     ->check('checkE')
                     ->press('Submit');

         });
    }
}
