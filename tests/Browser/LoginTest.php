<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    // public function testRegister()
    // {
    //     $this->browse(function (Browser $browser) {
    //         $browser->visit('/')
    //                 ->clickLink('Registre') //Click the Register link
    //                 ->assertSee('Registre') //Make sure the phrase in the arguement is on the page
    //                 //Fill the form with these values
    //                 ->value('#name', 'Joe') 
    //                 ->value('#email', 'joe@example.com')
    //                 ->value('#password', '123456')
    //                 ->value('#password-confirm', '123456')
    //                 ->click('button[type="submit"]') //Click the submit button on the page
    //                 ->assertPathIs('/home') //Make sure you are in the home page
    //                 //Make sure you see the phrase in the arguement
    //                 ->assertSee("You are logged in!"); 
    //     });
    // }

    /**
     * Test de Login amb usuari gestor
     */
    public function testLoginAdminUser()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->clickLink('Entrar')
                ->assertSee('Iniciar sessió')
                ->value('input[name="email"]', 'pacoramon@univeylandia-parc.cat')
                ->value('input[name="password"]', 'Alumne123')
                ->click('button[type="submit"]')
                ->assertPathIs('/')
                ->visit('/gestio')
                ->assertSee("Benvingut a la gestió del Parc d'Atraccions Univeylandia");
        });
    }
}
