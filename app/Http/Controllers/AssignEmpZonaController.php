<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use \App\User;
use \App\Zona;
use \App\AssignEmpZona;
use \App\ServeisZones;

/**
 * Classe per assignar empleat a zona
 */
class AssignEmpZonaController extends Controller
{
    /**
     * Selecciona totes les zona i les retorna a la vista indez
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assignacions = Zona::all();

        return view('gestio/AssignEmpZona/index', compact('assignacions'));
    }

    /**
     * Busca una Zona en concret i retorna la zona a la vista
     *
     * 
     * @param zona
     */
    public function viewData(Request $request, $id)
    {

        $zona = Zona::find($id);
        return view('gestio/AssignEmpZona/date', compact('zona'));
    }

    /**
     * Busca els empleats lliures i els retorna a la vista
     *
     * @return \Illuminate\Http\Response
     */
    public function filterEmploye(Request $request, $id)
    {

        $data_inici = $request->get('data_inici_assignacio_empleat');
        $data_fi = $request->get('data_fi_assignacio_empleat');

        $user = AssignEmpZona::assignarMantenimentFiltro($data_inici, $data_fi);
        $id_zona = Zona::find($id);

        return view('gestio/AssignEmpZona/freeEmploye', compact('user', 'data_inici', 'data_fi', 'id_zona'));
    }

    /**
     * Guarda els empleats assignats
     *
     * @return \Illuminate\Http\Response
     */
    public function saveAssign(Request $request, $id)
    {

        $request->validate([
            'id_zona' => 'required',
            'id_empleat' => 'required',
            'data_inici_modal' => 'required',
            'data_fi_modal' => 'required'
        ]);


        $AssignEmpZona = new ServeisZones([
            'id_zona' => $request->get('id_zona'),
            'id_servei' => 2,
            'id_empleat' => $request->get('id_empleat'),
            'data_inici' => $request->get('data_inici_modal'),
            'data_fi' => $request->get('data_fi_modal'),
        ]);

        $AssignEmpZona->save();
        return redirect('gestio/AssignEmpZona')->with('success', 'Assignacio creada correctament');
    }

    /**
     * Llista els empleats assignats
     *
     * @return \Illuminate\Http\Response
     */
    public function listAssign()
    {

        $assign = AssignEmpZona::llistarEmpassign();
        return view('gestio/AssignEmpZona/llistarAssign', compact('assign'));
    }

    /**
     * Borra les assignacions
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteAssign($id)
    {


        $assignacio = AssignEmpZona::find($id);

        $assignacio->delete();

        $assign = AssignEmpZona::llistarEmpassign();

        return view('gestio/AssignEmpZona/llistarAssign', compact('assign'));
    }

    /**
     * Busca les sones i retorna la vista date
     *
     * @return \Illuminate\Http\Response
     */
    public function viewDataNeteja(Request $request, $id)
    {

        $zona = Zona::find($id);
        return view('gestio/AssignEmpZona/dateNeteja', compact('zona'));
    }

    /**
     * Filtra els empleats per rol
     *
     * @return \Illuminate\Http\Response
     */
    public function filterEmployeNeteja(Request $request, $id)
    {

        $data_inici = $request->get('data_inici_assignacio_empleat');
        $data_fi = $request->get('data_fi_assignacio_empleat');

        $user = AssignEmpZona::assignarNetejaFiltro($data_inici, $data_fi);
        $id_zona = Zona::find($id);

        return view('gestio/AssignEmpZona/freeEmployeNeteja', compact('user', 'data_inici', 'data_fi', 'id_zona'));
    }

    /**
     * Guarda l'assignacio
     *
     * @return \Illuminate\Http\Response
     */
    public function saveAssignNeteja(Request $request, $id)
    {

        $request->validate([
            'id_zona' => 'required',
            'id_empleat' => 'required',
            'data_inici_modal' => 'required',
            'data_fi_modal' => 'required'
        ]);

        $AssignEmpZona = new ServeisZones([
            'id_zona' => $request->get('id_zona'),
            'id_servei' => 1,
            'id_empleat' => $request->get('id_empleat'),
            'data_inici' => $request->get('data_inici_modal'),
            'data_fi' => $request->get('data_fi_modal'),
        ]);

        $AssignEmpZona->save();
        return redirect('gestio/AssignEmpZona')->with('success', 'Assignacio creada correctament');
    }

    /**
     * Busca les zones amb el mateix id
     *
     * @return \Illuminate\Http\Response
     */
    public function viewDataAtencio(Request $request, $id)
    {

        $zona = Zona::find($id);
        return view('gestio/AssignEmpZona/dateAtencio', compact('zona'));
    }

    /**
     * Filtra els empleats per rol i retorna una llista de empleats amb el rol seleccionat
     *
     * @return \Illuminate\Http\Response
     */
    public function filterEmployeAtencio(Request $request, $id)
    {

        $data_inici = $request->get('data_inici_assignacio_empleat');
        $data_fi = $request->get('data_fi_assignacio_empleat');

        $user = AssignEmpZona::assignarAtencioFiltro($data_inici, $data_fi);
        $id_zona = Zona::find($id);

        return view('gestio/AssignEmpZona/freeEmployeAtencio', compact('user', 'data_inici', 'data_fi', 'id_zona'));
    }

    /**
     * Guarda l'assignacio del empleat
     *
     * @return \Illuminate\Http\Response
     */
    public function saveAssignAtencio(Request $request, $id)
    {

        $request->validate([
            'id_zona' => 'required',
            'id_empleat' => 'required',
            'data_inici_modal' => 'required',
            'data_fi_modal' => 'required'
        ]);

        $AssignEmpZona = new ServeisZones([
            'id_zona' => $request->get('id_zona'),
            'id_servei' => 3,
            'id_empleat' => $request->get('id_empleat'),
            'data_inici' => $request->get('data_inici_modal'),
            'data_fi' => $request->get('data_fi_modal'),
        ]);

        $AssignEmpZona->save();
        return redirect('gestio/AssignEmpZona')->with('success', 'Assignacio creada correctament');
    }

    /**
     * Retorna la vista per a les dates
     *
     * @return \Illuminate\Http\Response
     */
    public function viewDataShow(Request $request, $id)
    {

        $zona = Zona::find($id);
        return view('gestio/AssignEmpZona/dateShow', compact('zona'));
    }

    /**
     * Filtra els empleats per rol
     *
     * @return \Illuminate\Http\Response
     */
    public function filterEmployeShow(Request $request, $id)
    {

        $data_inici = $request->get('data_inici_assignacio_empleat');
        $data_fi = $request->get('data_fi_assignacio_empleat');

        $user = AssignEmpZona::assignarShowFiltro($data_inici, $data_fi);
        $id_zona = Zona::find($id);

        return view('gestio/AssignEmpZona/freeEmployeShow', compact('user', 'data_inici', 'data_fi', 'id_zona'));
    }

    /**
     * Guarda les assignacions
     *
     * @return \Illuminate\Http\Response
     */
    public function saveAssignShow(Request $request, $id)
    {

        $request->validate([
            'id_zona' => 'required',
            'id_empleat' => 'required',
            'data_inici_modal' => 'required',
            'data_fi_modal' => 'required'
        ]);

        $AssignEmpZona = new ServeisZones([
            'id_zona' => $request->get('id_zona'),
            'id_servei' => 4,
            'id_empleat' => $request->get('id_empleat'),
            'data_inici' => $request->get('data_inici_modal'),
            'data_fi' => $request->get('data_fi_modal'),
        ]);

        $AssignEmpZona->save();
        return redirect('gestio/AssignEmpZona')->with('success', 'Assignacio creada correctament');
    }

    /**
     * Retorna la vista de les dates 
     *
     * @return \Illuminate\Http\Response
     */
    public function viewDataSeguretat(Request $request, $id)
    {

        $zona = Zona::find($id);
        return view('gestio/AssignEmpZona/dateSeg', compact('zona'));
    }

    /**
     * Filtra els empleats de seguretat
     *
     * @return \Illuminate\Http\Response
     */
    public function filterEmployeSeguretat(Request $request, $id)
    {

        $data_inici = $request->get('data_inici_assignacio_empleat');
        $data_fi = $request->get('data_fi_assignacio_empleat');

        $user = AssignEmpZona::assignarSeguretatFiltro($data_inici, $data_fi);

        $id_zona = Zona::find($id);

        return view('gestio/AssignEmpZona/freeEmployeSeg', compact('user', 'data_inici', 'data_fi', 'id_zona'));
    }

    /**
     * Guarda les assignacions
     *
     * @return \Illuminate\Http\Response
     */
    public function saveAssignSeguretat(Request $request, $id)
    {

        $request->validate([
            'id_zona' => 'required',
            'id_empleat' => 'required',
            'data_inici_modal' => 'required',
            'data_fi_modal' => 'required'
        ]);

        $AssignEmpZona = new ServeisZones([
            'id_zona' => $request->get('id_zona'),
            'id_servei' => 5,
            'id_empleat' => $request->get('id_empleat'),
            'data_inici' => $request->get('data_inici_modal'),
            'data_fi' => $request->get('data_fi_modal'),
        ]);

        $AssignEmpZona->save();

        return redirect('gestio/AssignEmpZona')->with('success', 'Assignacio creada correctament');
    }
}
