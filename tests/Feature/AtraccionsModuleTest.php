<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Carbon;

class AtraccionsModuleTest extends TestCase
{
    use RefreshDatabase;

    /** @setUp for database seeding */
    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh');
        // $this->artisan('db:seed');
        $this->seed('RolsTableSeeder');
        $this->seed('HorarisTableSeeder');
        $this->seed('DadesEmpleatSeeder');
        $this->seed('UsersTableSeeder');
        $this->seed('TipusAtraccionsTableSeeder');
        $this->seed('ZonesSeeder');
        $this->seed('AtraccionsSeeder');
    }

    /** @test */
    function it_will_not_load_the_atraccions_list_page_if_user_not_authenticated()
    {
        $this->get('/gestio/atraccions')
            ->assertStatus(302);
    }

    /** @test */
    function it_will_not_load_the_atraccions_list_page_if_user_is_not_admin()
    {
        $user = \App\User::where('email', 'dalasito@univeylandia-parc.cat')->first();

        $this->actingAs($user)
            ->get('/gestio/atraccions')
            ->assertStatus(302);
    }

    /** @test */
    function it_loads_the_atraccions_list_page_if_user_is_admin()
    {
        $user = \App\User::where('email', 'pacoramon@univeylandia-parc.cat')->first();

        $this->actingAs($user)
            ->get('/gestio/atraccions')
            ->assertStatus(200)
            ->assertSee('Llistar les atraccions');
    }

    /** @test */
    function it_loads_the_atraccions_creation_page_if_user_is_admin()
    {
        $user = \App\User::where('email', 'pacoramon@univeylandia-parc.cat')->first();

        $this->actingAs($user)
            ->get('/gestio/atraccions/create')
            ->assertStatus(200)
            ->assertSee('Registrar Atracció');
    }


    /** @test */
    function it_loads_the_atraccions_edit_page_if_user_is_admin_and_atraccions_exists()
    {
        $user = \App\User::where('email', 'pacoramon@univeylandia-parc.cat')->first();

        $this->actingAs($user)
            ->get('/gestio/atraccions/1/edit')
            ->assertStatus(200)
            ->assertSee('Modificar Atraccions');
    }

    /** @test */
    function it_fails_to_load_the_atraccions_edit_page_if_user_is_admin_and_atraccions_does_not_exist()
    {
        $user = \App\User::where('email', 'pacoramon@univeylandia-parc.cat')->first();

        $this->actingAs($user)
            ->get('/gestio/atraccions/9999999/edit')
            ->assertStatus(404);
    }
    
}
