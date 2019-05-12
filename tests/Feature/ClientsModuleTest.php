<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Carbon;

class ClientsModuleTest extends TestCase
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
    }

    /** @test */
    function it_will_not_load_the_client_list_page_if_user_not_authenticated()
    {
        $this->get('/gestio/clients')
            ->assertStatus(302);
    }

    /** @test */
    function it_will_not_load_the_client_list_page_if_user_is_not_admin()
    {
        $user = \App\User::where('email','dalasito@univeylandia-parc.cat')->first();

        $this->actingAs($user)
            ->get('/gestio/clients')
            ->assertStatus(404);
    }

    /** @test */
    function it_loads_the_client_list_page_if_user_is_admin()
    {
        $user = \App\User::where('email','pacoramon@univeylandia-parc.cat')->first();

        factory(\App\User::class)->create([
            'nom' => 'Evaldas',
            'id_rol' => 1,
            'email_verified_at' => Carbon\Carbon::now(),
        ]);

        $this->actingAs($user)
            ->get('/gestio/clients')
            ->assertStatus(200)
            ->assertSee('Clients')
            ->assertSee('Evaldas');
    }

    /** @test */
    function it_loads_the_client_creation_page_if_user_is_admin()
    {
        $user = \App\User::where('email','pacoramon@univeylandia-parc.cat')->first();

        $this->actingAs($user)
            ->get('/gestio/clients/create')
            ->assertStatus(200)
            ->assertSee('Crear client');
    }

    /** @test */
    function it_loads_the_client_show_page_if_user_is_admin_and_client_exists()
    {
        $user = \App\User::where('email','pacoramon@univeylandia-parc.cat')->first();

        $this->actingAs($user)
            ->get('/gestio/clients/1')
            ->assertStatus(200)
            ->assertSee('Dades client:');
    }

    /** @test */
    function it_fails_to_load_the_client_show_page_if_user_is_admin_and_client_does_not_exist()
    {
        $user = \App\User::where('email','pacoramon@univeylandia-parc.cat')->first();

        $this->actingAs($user)
            ->get('/gestio/clients/9999999')
            ->assertStatus(404);
    }

    /** @test */
    function it_loads_the_client_edit_page_if_user_is_admin_and_client_exists()
    {
        $user = \App\User::where('email','pacoramon@univeylandia-parc.cat')->first();

        $this->actingAs($user)
            ->get('/gestio/clients/1/edit')
            ->assertStatus(200)
            ->assertSee('Modificar client');
    }

    /** @test */
    function it_fails_to_load_the_client_edit_page_if_user_is_admin_and_client_does_not_exist()
    {
        $user = \App\User::where('email','pacoramon@univeylandia-parc.cat')->first();

        $this->actingAs($user)
            ->get('/gestio/clients/9999999/edit')
            ->assertStatus(404);
    }

    /** @test */
    function it_loads_the_deactivated_client_list_page_if_user_is_admin()
    {
        $user = \App\User::where('email','pacoramon@univeylandia-parc.cat')->first();

        $new_user = factory(\App\User::class)->create([
            'nom' => 'Evaldas',
            'id_rol' => 1,
            'email_verified_at' => Carbon\Carbon::now(),
        ]);

        $new_user->delete();

        $this->actingAs($user)
            ->get('/gestio/clients/deactivated')
            ->assertStatus(200)
            ->assertSee('Clients desactivats')
            ->assertSee('Evaldas');
    }
}
