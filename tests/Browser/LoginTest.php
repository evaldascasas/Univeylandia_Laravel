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

    public function testLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Entrar') //Click the Register link
                    ->assertSee('Iniciar sessió') //Make sure the phrase in the arguement is on the page
                    //Fill the form with these values
                    ->value('input[name="email"]', 'pacoramon@univeylandia-parc.cat')
                    ->value('input[name="password"]', 'Alumne123')
                    ->click('button[type="submit"]') //Click the submit button on the page
                    ->assertPathIs('/') //Make sure you are in the home page
                    ->visit('/perfil')
                    //Make sure you see the phrase in the arguement
                    ->assertSee("Paco"); 
        });
    }
}
