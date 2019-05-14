<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use \App\Servei;
use \App\User;
use \App\Zona;
use \App\ServeisZones;

class ServeisController extends Controller
{
    /**
     * Acció que s'encarrega de llistar els serveis del parc.
     *
     * @return /Illuminate/Http/Response
     */
    public function index()
    {
        $assignacions = Zona::join('serveis_zones', 'serveis_zones.id_zona', '=', 'zones.id')
            ->join('users', 'serveis_zones.id_empleat', '=', 'users.id')
            ->join('serveis', 'serveis_zones.id_servei', '=', 'serveis.id')
            ->get([
                'serveis_zones.id as id',
                'zones.nom as nom_zona',
                'serveis.nom as nom_servei',
                'users.nom as nom_empleat'
            ]);

        return view('gestio/serveis/index', compact('assignacions'));
    }

    /**
     * Acció que s'encarrega de retornar la vista per a crear un servei.
     *
     * @return /Illuminate/Http/Response
     */
    public function create()
    {
        $treballadors = User::where('id_rol', 3)->whereNotNull('email_verified_at')->get();

        $zones = Zona::all();

        $serveis = Servei::all();

        return view('gestio/serveis/create', compact('serveis', 'zones', 'treballadors'));
    }

    /**
     * Acció que guarda el servei creat a la base de dades.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return /Illuminate/Http/Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'seleccio_zona' => 'required',
            'nom_servei' => 'required',
            'data_inici_assign' => 'required',
            'data_fi_assign' => 'required',
            'seleccio_empleat' => 'required'
        ]);

        $servei_zona = new ServeisZones([
            'id_zona' => $request->get('seleccio_zona'),
            'id_servei' => $request->get('nom_servei'),
            'id_empleat' => $request->get('seleccio_empleat'),
            'data_inici' => $request->get('data_inici_assign'),
            'data_fi' => $request->get('data_fi_assign'),
        ]);

        $servei_zona->save();

        return redirect('/gestio/serveis')->with('success', 'Assignació creada correctament');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return /Illuminate/Http/Response
     */
    public function show($id)
    { }

    /**
     * Acció que s'encarrega de mostrar les dades del servei per a modificarles.
     *
     * @param  int  $id
     * @return /Illuminate/Http/Response
     */
    public function edit($id)
    {
        $assign = ServeisZones::findOrFail($id);

        $treballadors = User::where('id_rol', 3)->whereNotNull('email_verified_at')->get();

        $zones = Zona::all();

        $serveis = Servei::all();

        return view('gestio/serveis/edit', compact(['assign', 'serveis', 'zones', 'treballadors']));
    }

    /**
     * Acció que s'encarrega d'actualitzar les dades a la base de dades.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return /Illuminate/Http/Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'seleccio_zona' => 'required',
            'nom_servei' => 'required',
            'data_inici_assign' => 'required',
            'data_fi_assign' => 'required',
            'seleccio_empleat' => 'required'
        ]);

        $servei = ServeisZones::findOrFail($id);

        $servei->id_zona = $request->get('seleccio_zona');
        $servei->id_servei = $request->get('nom_servei');
        $servei->id_empleat = $request->get('seleccio_empleat');
        $servei->data_inici = $request->get('data_inici_assign');
        $servei->data_fi = $request->get('data_fi_assign');

        $servei->save();

        return redirect('gestio/serveis')->with('success', 'Incidència editada correctament');
    }

    /**
     * Acció que s'encarrega de canviar l'estat del servei a finalitzat
     *
     * @param  int  $id
     * @return /Illuminate/Http/Response
     */
    public function destroy($id)
    {
        $servei = ServeisZones::findOrFail($id);

        $servei->delete();

        return redirect('gestio/serveis')->with('success', 'Servei eliminat correctament');
    }
}