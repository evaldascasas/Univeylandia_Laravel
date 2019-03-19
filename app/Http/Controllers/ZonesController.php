<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Zona;
use Auth;

class ZonesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $zones = Zona::withoutGlobalScopes(['zones.id','zones.nom'])
          ->get();

      return view('gestio/zones/index', compact('zones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gestio/zones/create');
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

      $user = Auth::user();

      $zona = new Zona([
          'nom' => $request->get('nom'),
      ]);
      $zona->save();
      return redirect('/gestio/zones')->with('success', 'Zona creada correctament');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $zona = Zona::find($id);

      return view('gestio/zones/edit',compact('zona'));
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
        'zona_nom'=>'required'
      ]);

      $zona = Zona::find($id);
      $zona->nom = $request->get('zona_nom');
      $zona->save();

      return redirect('/gestio/zones')->with('success', 'Zona actualitzada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $zona = Zona::find($id);
      $zona->delete();

      return redirect('/gestio/zones')->with('success', 'Zona eliminada.');
    }
}
