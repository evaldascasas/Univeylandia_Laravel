<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use \App\User;
use \App\Zona;
use \App\AssignEmpZona;

class AssignEmpZonaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $assignacions = AssignEmpZona::join ('zones','empleat_zona.id_zona', '=', 'zones.id')
    ->join('users', 'empleat_zona.id_empleat', '=', 'users.id')
    ->get ([
      'empleat_zona.id as id',
      'zones.nom as nom_zona',
      'users.nom as nom_empleat',
      'empleat_zona.data_inici as data_inici',
      'empleat_zona.data_fi as data_fi'
    ]);

    return view('gestio/AssignEmpZona/index', compact('assignacions'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $treballadors = User::where('id_rol',5)
      ->whereNotNull('email_verified_at')
      ->whereNotNull('id_dades_empleat')
      ->get();

      $zones = Zona::all();

      return view('gestio/AssignEmpZona/create', compact('zones','treballadors'));
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
        'seleccio_zona' => 'required',
        'data_inici_assign' => 'required',
        'data_fi_assign' => 'required',
        'seleccio_empleat' => 'required'
    ]);

    $assignEmpZona = new AssignEmpZona([
        'id_zona' => $request->get('seleccio_zona'),
        'id_empleat' => $request->get('seleccio_empleat'),
        'data_inici'=> $request->get('data_inici_assign'),
        'data_fi'=> $request->get('data_fi_assign')
    ]);

    $assignEmpZona->save();

    return redirect('/gestio/AssignEmpZona')->with('success', 'Assignació creada correctament');
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
    $treballadors = User::where('id_rol',5)
    ->whereNotNull('email_verified_at')
    ->whereNotNull('id_dades_empleat')
    ->get();

    $zones = Zona::all();
    $assign = AssignEmpZona::find($id);

    return view('gestio/AssignEmpZona/edit', compact(['assign','zones','treballadors']));
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
      'seleccio_zona' => 'required',
      'data_inici_assign'=>'required',
      'data_fi_assign'=>'required',
      'seleccio_empleat' => 'required'
    ]);

    $assign = AssignEmpZona::findOrFail($id);

    $assign->id_zona = $request->get('seleccio_zona');
    $assign->id_empleat = $request->get('seleccio_empleat');
    $assign->data_inici = $request->get('data_inici_assign');
    $assign->data_fi = $request->get('data_fi_assign');
    $assign->save();

    return redirect('gestio/AssignEmpZona')->with('success', 'Assignació editada correctament');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $assig = AssignEmpZona::findOrFail($id);
    $assig->delete();

    return redirect('gestio/AssignEmpZona')->with('success', 'Assignació eliminada correctament');
  }
}
