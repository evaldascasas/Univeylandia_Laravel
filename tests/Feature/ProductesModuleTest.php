<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use \App\Producte;

class ProductesModuleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
     /** @test */
     function it_loads_the_productes_list_page_if_user_not_authenticated()
     {
         $this->get('/gestio/productes')
             ->assertStatus(302);
     }
     /** @test */
     function it_loads_the_productes_list_page_if_user_is_not_admin()
     {
         $user = \App\User::where('email','dalasito@univeylandia-parc.cat')->first();

         $this->actingAs($user)
             ->get('/gestio/productes')
             ->assertStatus(302);
     }
     /** @test */
     function it_loads_the_productes_list_page_if_user_is_admin()
     {
         $user = \App\User::where('email','pacoramon@univeylandia-parc.cat')->first();

         $this->actingAs($user)
             ->get('/gestio/productes')
             ->assertStatus(200);
     }
     /** @test */
     function it_loads_the_productes_imatges_page_if_user_is_not_admin()
     {
         $user = \App\User::where('email','dalasito@univeylandia-parc.cat')->first();

         $this->actingAs($user)
             ->get('/gestio/productes/imatges')
             ->assertStatus(302);
     }
     /** @test */
     function it_loads_the_productes_imatges_page_if_user_is_admin()
     {
         $user = \App\User::where('email','pacoramon@univeylandia-parc.cat')->first();

         $this->actingAs($user)
             ->get('/gestio/productes/imatges')
             ->assertStatus(200);
     }
     /** @test */
     function it_loads_the_productes_imatges_upload_page_if_user_is_not_admin()
     {
         $user = \App\User::where('email','dalasito@univeylandia-parc.cat')->first();

         $this->actingAs($user)
             ->get('/gestio/productes/imatges/upload')
             ->assertStatus(302);
     }
     /** @test */
     function it_loads_the_productes_imatges_upload_page_if_user_is_admin()
     {
         $user = \App\User::where('email','pacoramon@univeylandia-parc.cat')->first();

         $this->actingAs($user)
             ->get('/gestio/productes/imatges/upload')
             ->assertStatus(200);
     }
     /** @test */
     function it_loads_the_productes_creation_page_if_user_is_admin()
     {
         $user = \App\User::where('email','pacoramon@univeylandia-parc.cat')->first();

         $this->actingAs($user)
             ->get('/gestio/productes/create')
             ->assertStatus(200)
             ->assertSee('Registrar producte');
     }
     /** @test */
     function it_loads_the_productes_edit_page_if_user_is_admin_and_producte_exists()
     {
         $user = \App\User::where('email','pacoramon@univeylandia-parc.cat')->first();

         $this->actingAs($user)
             ->get('/gestio/productes/1/edit')
             ->assertStatus(200)
             ->assertSee('Editar producte');
     }
     /** @test */
     function it_loads_the_productes_edit_page_if_user_is_admin_and_producte_does_not_exist()
     {
         $user = \App\User::where('email','pacoramon@univeylandia-parc.cat')->first();

         $this->actingAs($user)
             ->get('/gestio/clients/9999999/edit')
             ->assertStatus(404);
     }
     /** @test */
     function create_producte(){
        $user = \App\User::where('email','pacoramon@univeylandia-parc.cat')->first();
        $this->actingAs($user);
        $this->json('POST', '/gestio/productes', [
          'tipus' => '1',
          'tickets_viatges' => '100',
          'descripcio' => 'Test ticket general adult',
          'preu' => '666',
          'estat' => '1',
          ])->assertStatus(302);
     }
     /** @test */
     function update_producte(){
        $user = \App\User::where('email','pacoramon@univeylandia-parc.cat')->first();
        $producte = Producte::orderBy('id', 'desc')->first();
        $this->actingAs($user);
        $this->json('PUT', '/gestio/productes/'.$producte->id, [
          'tipus' => '1',
          'tickets_viatges' => '100',
          'descripcio' => 'Test ticket general adult update',
          'preu' => '333',
          'estat' => '1',
          ])->assertStatus(302);
     }
     /** @test */
     function delete_producte(){
        $user = \App\User::where('email','pacoramon@univeylandia-parc.cat')->first();
        $producte = Producte::orderBy('id', 'desc')->first();
        $this->actingAs($user);
        $this->json('DELETE', '/gestio/productes/'.$producte->id, [])->assertStatus(302);
     }
}
