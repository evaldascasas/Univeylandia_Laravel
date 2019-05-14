<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use \App\Incidencia;
use \App\PrioritatIncidencia;
use \App\User;
use \App\Rol;

use App\Notifications\IncidenceAssigned;

use Auth;
use Image;
use PDF;
use Carbon;

class IncidenciesController extends Controller
{

    /**
     * Acció que s'encarrega de mostrar una llista d'incidencies per a assignar.
     *
     * @return /Illuminate/Http/Response
     */
    public function index()
    {
        $incidencies = Incidencia::where('id_estat', 1)
            ->orderBy('id_prioritat', 'DESC')
            ->join('users AS u1', 'incidencies.id_usuari_reportador', 'u1.id')
            ->join('tipus_prioritat', 'incidencies.id_prioritat', 'tipus_prioritat.id')
            ->join('estat_incidencies', 'estat_incidencies.id', 'incidencies.id_estat')
            ->get([
                'incidencies.id as id',
                'incidencies.titol as titol',
                'incidencies.descripcio as descripcio',
                'u1.nom as nom_usuari_reportador',
                'tipus_prioritat.nom_prioritat as nom_prioritat',
                'estat_incidencies.nom_estat as nom_estat'
            ]);

        return view('gestio/incidencies/index', compact('incidencies'));
    }

    /**
     * Acció que s'encarrega de mostrar les incidencies assignades.
     *
     * @return /Illuminate/Http/Response
     */
    public function assigned()
    {
        $incidencies = Incidencia::where('id_estat', 2)
            ->orderBy('id_prioritat', 'DESC')
            ->join('users AS u1', 'incidencies.id_usuari_reportador', 'u1.id')
            ->join('users AS u2', 'incidencies.id_usuari_assignat', 'u2.id')
            ->join('tipus_prioritat', 'incidencies.id_prioritat', 'tipus_prioritat.id')
            ->join('estat_incidencies', 'incidencies.id_estat', 'estat_incidencies.id')
            ->get([
                'incidencies.id as id',
                'incidencies.titol as titol',
                'incidencies.descripcio as descripcio',
                'u1.nom as nom_usuari_reportador',
                'u2.nom as nom_usuari_assignat',
                'tipus_prioritat.nom_prioritat as nom_prioritat',
                'estat_incidencies.nom_estat as nom_estat'
            ]);

        return view('gestio/incidencies/assign', compact('incidencies'));
    }

    /**
     * Acció que s'encarrega de mostrar les incidencies finalitzades.
     *
     * @return /Illuminate/Http/Response
     */
    public function done()
    {
        $incidencies = Incidencia::where('id_estat', 3)
            ->orderBy('id_prioritat', 'DESC')
            ->join('users AS u1', 'incidencies.id_usuari_reportador', 'u1.id')
            ->join('users AS u2', 'incidencies.id_usuari_assignat', 'u2.id')
            ->join('tipus_prioritat', 'incidencies.id_prioritat', 'tipus_prioritat.id')
            ->join('estat_incidencies', 'incidencies.id_estat', 'estat_incidencies.id')
            ->get([
                'incidencies.id as id',
                'incidencies.titol as titol',
                'incidencies.descripcio as descripcio',
                'u1.nom as nom_usuari_reportador',
                'u2.nom as nom_usuari_assignat',
                'tipus_prioritat.nom_prioritat as nom_prioritat',
                'estat_incidencies.nom_estat as nom_estat'
            ]);

        return view('gestio/incidencies/done', compact('incidencies'));
    }


    /**
     * Acció que s'encarrega de retornar la vista per a crear una incidencia.
     *
     * @return /Illuminate/Http/Response
     */
    public function create()
    {
        $prioritats = PrioritatIncidencia::all();

        return view('gestio/incidencies/create', compact('prioritats'));
    }


    /**
     * Acció que s'encarrega de guardar una incidencia.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return /Illuminate/Http/Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'priority' => 'required|integer'
        ]);

        $user = Auth::user();

        $incidencia = new Incidencia([
            'titol' => $request->get('title'),
            'descripcio' => $request->get('description'),
            'id_prioritat' => $request->get('priority'),
            'id_estat' => 1,
            'id_usuari_reportador' => $user->id,
        ]);

        $incidencia->save();

        return redirect('/gestio/incidencies')->with('success', 'Incidència creada correctament');
    }

    /**
     * Acció que s'encarrega de guardar les incidencies reportades.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return /Illuminate/Http/Response
     */
    public function store_incidencia(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'priority' => 'required|integer'
        ]);

        $user = Auth::user();

        $incidencia = new Incidencia([
            'titol' => $request->get('title'),
            'descripcio' => $request->get('description'),
            'id_prioritat' => $request->get('priority'),
            'id_estat' => 1,
            'id_usuari_reportador' => $user->id,
        ]);

        $incidencia->save();

        return redirect('incidencia')->with('success', 'Incidència reportada correctament');
    }

    /**
     * Acció que s'encarrega de mostrar totes les dades d'una incidencia.
     *
     * @param  int  $id
     * @return /Illuminate/Http/Response
     */
    public function show($id)
    {
        $incidencia = Incidencia::findOrFail($id);

        $prioritats = PrioritatIncidencia::all();

        $treballadors = User::where('id_rol', 3)
            ->orWhere('id_rol', 4)
            ->orWhere('id_rol', 5)
            ->whereNotNull('email_verified_at')
            ->get();

        return view('gestio/incidencies/show', compact(['incidencia', 'prioritats', 'treballadors']));
    }

    /**
     * Acció que s'encarrega de carregar les dades a l'hora de modificar una incidencia.
     *
     * @param  int  $id
     * @return /Illuminate/Http/Response
     */
    public function edit($id)
    {
        $incidencia = Incidencia::findOrFail($id);

        $prioritats = PrioritatIncidencia::all();

        $rols = Rol::all();

        $treballador_assignat = User::find($incidencia->id_usuari_assignat);

        $treballadors = User::where('id_rol', '!=', 1)
            ->where('id_rol', '!=', 2)
            ->whereNotNull('email_verified_at')
            ->get();

        return view('gestio/incidencies/edit', compact(['incidencia', 'prioritats', 'treballadors', 'treballador_assignat', 'rols']));
    }

    /**
     * Accio que s'encarrega de actualizar les dades modificades d'una incidencia.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return /Illuminate/Http/Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'priority' => 'required',
            'assigned-employee' => 'required'
        ]);

        $user_diferent = false;
        $incidencia = Incidencia::findOrFail($id);

        $user = User::find($request->get('assigned-employee'));

        if ($user->id != $incidencia->id_usuari_assignat) {
            $user_diferent = true;
        }

        $incidencia->titol = $request->get('title');
        $incidencia->descripcio = $request->get('description');
        $incidencia->id_prioritat = $request->get('priority');
        $incidencia->id_estat = 2;
        $incidencia->id_usuari_assignat = $request->get('assigned-employee');
        $incidencia->save();

        //Enviar notificacio - guardar notificacio en la taula 'notifications'
        if ($user_diferent) {
            $notificacio = ([
                'id' => $incidencia->id,
                'titol' => "Nova incidencia: " . $incidencia->titol,
                'descripcio' => $incidencia->descripcio
            ]);
            $notificacio_enviar = collect($notificacio);
            $user->notify(new IncidenceAssigned($notificacio_enviar));
        }

        return redirect('gestio/incidencies/assign')->with('success', 'Incidència assignada correctament');
    }

    /**
     * Acció que s'encarrega de borrar la incidencia especificada.
     *
     * @param  int  $id
     * @return /Illuminate/Http/Response
     */
    public function destroy($id)
    {
        $incidencia = Incidencia::findOrFail($id);

        $incidencia->delete();

        return redirect()->back()->with('success', 'Incidència eliminada correctament');
    }

    /**
     * Acció que s'encarrega de canviar l'estat de la incidencia a finalitzada/done.
     *
     * @param  int  $id
     * @return /Illuminate/Http/Response
     */
    public function conclude($id)
    {
        $incidencia = Incidencia::findOrFail($id);

        $incidencia->id_estat = 3;

        $incidencia->save();

        return redirect('/tasques')->with('success', 'Incidència finalitzada correctament');
    }

    /**
     * Acció encarregada de generar el PDF.
     *
     * @return /Illuminate/Http/Response
     */
    public function assignadesGuardarPDF()
    {
        $incidencies = Incidencia::where('id_estat', 2)
            ->orderBy('id_prioritat', 'DESC')
            ->join('users AS u1', 'incidencies.id_usuari_reportador', 'u1.id')
            ->join('users AS u2', 'incidencies.id_usuari_assignat', 'u2.id')
            ->join('tipus_prioritat', 'incidencies.id_prioritat', 'tipus_prioritat.id')
            ->join('estat_incidencies', 'incidencies.id_estat', 'estat_incidencies.id')
            ->get([
                'incidencies.id as id',
                'incidencies.titol as titol',
                'incidencies.descripcio as descripcio',
                'u1.nom as nom_usuari_reportador',
                'u2.nom as nom_usuari_assignat',
                'tipus_prioritat.nom_prioritat as nom_prioritat',
                'estat_incidencies.nom_estat as nom_estat'
            ]);

        $temps = Carbon\Carbon::now();
        $temps = $temps->toDateString();

        try {
            $pdf = PDF::loadView('/gestio/incidencies/assignades_pdf', compact('incidencies'));
        } catch (\Exception $e) {
            Log::error($e);
            // return back()->with('error', 'Ha fallat la exportació en PDF.');
            return abort(500);
        }

        return $pdf->download('incidencies_assignades_' . $temps . '.pdf');
    }
}
