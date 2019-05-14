<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use \App\Servei;
use \App\User;
use \App\Zona;
use \App\AssignEmpZona;
use \App\ServeisZones;
use \App\Rol;

/**
 * Classe per assignar empleat a zona
 *
 * @return \Illuminate\Http\Response
 */

class AssignEmpZonaController extends Controller
{

    /**
     * Selecciona totes les zona i les retorna a la vista indez, si manel esta vista es la millor :) com el teu vendor
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $assignacions = Zona::all();

        return view('gestio/AssignEmpZona/index', compact('assignacions'));
    }

    public function create(Request $request, $id)
    {
        $zona = Zona::find($id);
        $rols = Rol::where('id', '!=', 1)
            ->where('id', '!=', 2)
            ->get();

        return view('gestio/AssignEmpZona/create', compact(['zona', 'rols']));
    }

    public function assignaEmpleat(Request $request)
    {
        $empleats = AssignEmpZona::assignarFiltro($request->data_inici, $request->data_fi, $request->id_serveis);
        return response()->json(array('empleats' => $empleats), 200);
    }

    public function guardarAssignacio(Request $request, $id)
    {
        $request->validate([
            'id_zona' => 'required',
            'id_empleat' => 'required',
            'data_inici_modal' => 'required',
            'data_fi_modal' => 'required'
        ]);

        $AssignEmpZona = new ServeisZones([
            'id_zona' => $request->get('id_zona'),
            'id_empleat' => $request->get('id_empleat'),
            'data_inici' => $request->get('data_inici_modal'),
            'data_fi' => $request->get('data_fi_modal'),
        ]);
        $AssignEmpZona->save();
        return redirect('/gestio/zones/assignacions/list')->with('success', 'Assignació creada correctament');
    }

    public function listAssign()
    {
        $assign = AssignEmpZona::llistarEmpassign();
        return view('gestio/AssignEmpZona/llistarAssign', compact('assign'));
    }

    public function deleteAssign($id)
    {
        $assignacio = AssignEmpZona::find($id);

        $assignacio->delete();

        $assign = AssignEmpZona::llistarEmpassign();

        return view('gestio/AssignEmpZona/llistarAssign', compact('assign'));
    }
}
