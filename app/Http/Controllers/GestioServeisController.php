<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use \App\Servei;
use \App\User;
use \App\ServeisZones;
use \App\GestioServei;

class GestioServeisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $serveis = GestioServei::all();
      return view('gestio/GestioServeis/index', compact('serveis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('gestio/GestioServeis/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
          'nom' => 'required'
      ]);

      $servei = new GestioServei([
          'nom' => $request->get('nom'),
      ]);
      $servei->save();
      return redirect('gestio/GestioServeis')->with('success', 'Servei creat correctament');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $servei = GestioServei::find($id);

      return view('gestio/GestioServeis/edit',compact('servei'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'nom'=>'required'
      ]);

      $servei = GestioServei::find($id);
      $servei->nom = $request->get('nom');
      $servei->save();

      return redirect('/gestio/GestioServeis')->with('success', 'Servei actualitzat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $servei = GestioServei::find($id);
      $servei->delete();

      return redirect('/gestio/GestioServeis')->with('success', 'Servei eliminat.');
    }
}
