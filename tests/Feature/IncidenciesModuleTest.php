<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Carbon;

class IncidenciesModuleTest extends TestCase
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
        $this->seed('EstatIncidenciesTableSeeder');
    }

    /** @test */
    function it_will_not_load_the_incidencies_list_page_if_user_not_authenticated()
    {
        $this->get('/gestio/incidencies')
            ->assertStatus(404);
    }

    /** @test */
    function it_will_not_load_the_incidencies_list_page_if_user_is_not_admin()
    {
        $user = \App\User::where('email', 'dalasito@univeylandia-parc.cat')->first();

        $this->actingAs($user)
            ->get('/gestio/incidencies')
            ->assertStatus(404);
    }

    /** @test */
    function it_loads_the_incidencies_list_page_if_user_is_admin()
    {
        $user = \App\User::where('email', 'pacoramon@univeylandia-parc.cat')->first();

        $this->actingAs($user)
            ->get('/gestio/incidencies')
            ->assertStatus(200)
            ->assertSee('Llistat d\'incidències per assignar');
    }

    /** @test */
    function it_loads_the_incidencies_creation_page_if_user_is_admin()
    {
        $user = \App\User::where('email', 'pacoramon@univeylandia-parc.cat')->first();

        $this->actingAs($user)
            ->get('/gestio/incidencies/create')
            ->assertStatus(200)
            ->assertSee('Crear Incidència');
    }


    /** @test */
    function it_loads_the_incidencies_edit_page_if_user_is_admin_and_incidencies_exists()
    {
        $user = \App\User::where('email', 'pacoramon@univeylandia-parc.cat')->first();

        $this->actingAs($user)
            ->get('/gestio/incidencies/1/edit')
            ->assertStatus(200)
            ->assertSee('Editar Incidència:');
    }

    /** @test */
    function it_fails_to_load_the_incidencies_edit_page_if_user_is_admin_and_incidencies_does_not_exist()
    {
        $user = \App\User::where('email', 'pacoramon@univeylandia-parc.cat')->first();

        $this->actingAs($user)
            ->get('/gestio/incidencies/9999999/edit')
            ->assertStatus(404);
    }

    /** @test */
    function it_loads_the_incidencies_show_page_if_user_is_admin_and_incidencies_exists()
    {
        $user = \App\User::where('email', 'pacoramon@univeylandia-parc.cat')->first();

        $this->actingAs($user)
            ->get('/gestio/incidencies/1')
            ->assertStatus(200)
            ->assertSee('Consultar Incidència:');
    }

    /** @test */
    function it_fails_to_load_the_incidencies_show_page_if_user_is_admin_and_incidencies_does_not_exist()
    {
        $user = \App\User::where('email', 'pacoramon@univeylandia-parc.cat')->first();

        $this->actingAs($user)
            ->get('/gestio/incidencies/9999999')
            ->assertStatus(404);
    }

}
