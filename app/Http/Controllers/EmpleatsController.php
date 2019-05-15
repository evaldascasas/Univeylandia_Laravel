<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use \App\Horari;
use \App\Rol;
use \App\DadesEmpleat;
use \App\User;
use Carbon;
use PDF;

class EmpleatsController extends Controller
{
    /**
     * Acció que s'encarrega de mostrar tots els usuaris empleat que no són administradors.
     *
     * @return /Illuminate/Http/Response
     */
    public function index()
    {
        $users = User::whereNotNull('email_verified_at')
            ->where('id_rol', '!=', 1)
            ->where('id_rol', '!=', 2)
            ->whereNotNull('id_dades_empleat')
            ->leftJoin('dades_empleats', 'dades_empleats.id', 'users.id_dades_empleat')
            ->leftJoin('rols', 'rols.id', 'users.id_rol')
            ->leftJoin('horaris', 'horaris.id', 'dades_empleats.id_horari')
            ->get([
                'users.id',
                'users.nom',
                'users.cognom1',
                'users.cognom2',
                'users.email',
                'users.password',
                'users.data_naixement',
                'users.adreca',
                'users.ciutat',
                'users.provincia',
                'users.codi_postal',
                'users.tipus_document',
                'users.numero_document',
                'users.sexe',
                'users.telefon',
                'users.cognom2',
                'users.id_rol',
                'dades_empleats.codi_seg_social as codi_seg_social',
                'dades_empleats.num_nomina as num_nomina',
                'dades_empleats.IBAN as IBAN',
                'dades_empleats.especialitat as especialitat',
                'dades_empleats.carrec as carrec',
                'dades_empleats.data_inici_contracte as data_inici_contracte',
                'dades_empleats.data_fi_contracte as data_fi_contracte',
                'horaris.torn as id_horari',
            ]);

        return view('gestio/empleats/index', compact('users'));
    }

    /**
     * Acció que s'encarrega de mostrar un formulari per a la creació d'un usuari empleat.
     *
     * @return /Illuminate/Http/Response
     */
    public function create()
    {
        $horaris = Horari::all();
        $rols = Rol::where('id', '!=', 1)->orderBy('id', 'DESC')->get();

        return view('gestio/empleats/create', compact(['horaris', 'rols']));
    }

    /**
     * Acció que s'encarrega d'emmagatzemar les dades d'un usuari empleat en la base de dades, 
     * compta amb una transacció de base de dades, per si falla al introduir les dades.
     * Envia un correu a l'usuari empleat creat amb un enllaç per canviar la contrasenya.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return /Illuminate/Http/Response
     */
    public function store(Request $request)
    {
        $randomPass = str_random(16);

        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'cognom1' => ['required', 'string', 'max:255'],
            'cognom2' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'data_naixement' => ['required', 'date'],
            'adreca' => ['required', 'string'],
            'ciutat' => ['required', 'string'],
            'provincia' => ['required', 'string'],
            'codi_postal' => ['required', 'string'],
            'tipus_document' => ['required', 'in:DNI,NIE'],
            'numero_document' => ['required', 'string'],
            'sexe' => ['required', 'in:Home,Dona'],
            'id_rol' => ['required', 'integer'],
            'codi_seg_social' => ['required', 'string', 'unique:dades_empleats'],
            'num_nomina' => ['required', 'string', 'unique:dades_empleats'],
            'IBAN' => ['required', 'string', 'unique:dades_empleats'],
            'especialitat' => ['required', 'string'],
            'carrec' => ['required', 'string'],
            'data_inici_contracte' => ['required', 'date', 'before:data_fi_contracte'],
            'data_fi_contracte' => ['required', 'date', 'after:data_inici_contracte'],
            'id_horari' => ['required', 'integer'],
        ]);

        $dades = new DadesEmpleat;

        $dades->codi_seg_social = $request->get('codi_seg_social');
        $dades->num_nomina = $request->get('num_nomina');
        $dades->IBAN = $request->get('IBAN');
        $dades->especialitat = $request->get('especialitat');
        $dades->carrec = $request->get('carrec');
        $dades->data_inici_contracte = $request->get('data_inici_contracte');
        $dades->data_fi_contracte = $request->get('data_fi_contracte');
        $dades->id_horari = $request->get('id_horari');

        $usuari = new User;

        $usuari->nom = $request->get('nom');
        $usuari->cognom1 = $request->get('cognom1');
        $usuari->cognom2 = $request->get('cognom2');
        $usuari->email = $request->get('email');
        $usuari->email_verified_at = Carbon\Carbon::now();
        $usuari->password = Hash::make($randomPass);
        $usuari->data_naixement = $request->get('data_naixement');
        $usuari->adreca = $request->get('adreca');
        $usuari->ciutat = $request->get('ciutat');
        $usuari->provincia = $request->get('provincia');
        $usuari->codi_postal = $request->get('codi_postal');
        $usuari->tipus_document = $request->get('tipus_document');
        $usuari->numero_document = $request->get('numero_document');
        $usuari->sexe = $request->get('sexe');
        $usuari->telefon = $request->get('telefon');
        $usuari->id_rol = $request->get('id_rol');

        //use a transaction so IF the query fails it does not insert nor update the resources
        DB::transaction(function () use ($dades, $usuari) {

            $dades->save();

            $usuari->id_dades_empleat = $dades->id;

            $usuari->save();

            if ($usuari->save()) {
                dispatch(new \App\Jobs\SendEmailOnUserCreationJob($usuari));
            }
        });

        return redirect('/gestio/empleats')->with('success', 'Empleat creat correctament');
    }

    /**
     * Acció que s'encarrega de mostrar dades d'un usuari empleat concret en un formulari no editable.
     *
     * @param  int  $id
     * @return /Illuminate/Http/Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        $dades = DadesEmpleat::find($user->id_dades_empleat);

        $rols = Rol::where('id', $user->id_rol)->get();

        $horaris = Horari::where('id', $dades->id_horari)->get();

        return view('gestio/empleats/show', compact(['user', 'dades', 'rols', 'horaris']));
    }

    /**
     * Acció que s'encarrega de mostrar les dades d'un usuari empleat en un formulari editable.
     *
     * @param  int  $id
     * @return /Illuminate/Http/Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $dades = DadesEmpleat::find($user->id_dades_empleat);
        $horaris = Horari::all();
        $rols = Rol::where('id', '!=', 1)->orderBy('id', 'DESC')->get();

        return view('gestio/empleats/edit', compact(['user', 'dades', 'horaris', 'rols']));
    }

    /**
     * Acció que s'encarrega d'emmagatzemar les dades actualitzades d'un usuari empleat concret. 
     * Compta amb l'ús de transacció de base de dades per si falla al actualitzar les dades.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return /Illuminate/Http/Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'cognom1' => ['required', 'string', 'max:255'],
            'cognom2' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'data_naixement' => ['required', 'date'],
            'adreca' => ['required', 'string'],
            'ciutat' => ['required', 'string'],
            'provincia' => ['required', 'string'],
            'codi_postal' => ['required', 'string'],
            'tipus_document' => ['required', 'string'],
            'numero_document' => ['required', 'string'],
            'sexe' => ['required', 'string'],
            'id_rol' => ['required', 'integer'],
            'codi_seg_social' => ['required', 'string'],
            'num_nomina' => ['required', 'string'],
            'IBAN' => ['required', 'string'],
            'especialitat' => ['required', 'string'],
            'carrec' => ['required', 'string'],
            'data_inici_contracte' => ['required', 'date', 'before:data_fi_contracte'],
            'data_fi_contracte' => ['required', 'date', 'after:data_inici_contracte'],
            'id_horari' => ['required', 'integer'],
        ]);

        $user = User::findOrFail($id);
        $user_dades = $user->id_dades_empleat;
        $dades = DadesEmpleat::find($user_dades);

        $user->nom = $request->get('nom');
        $user->cognom1 = $request->get('cognom1');
        $user->cognom2 = $request->get('cognom2');

        if ($user->email != $request->get('email')) {
            $user->email = $request->get('email');
        }

        $user->data_naixement = $request->get('data_naixement');
        $user->adreca = $request->get('adreca');
        $user->ciutat = $request->get('ciutat');
        $user->provincia = $request->get('provincia');
        $user->codi_postal = $request->get('codi_postal');
        $user->tipus_document = $request->get('tipus_document');
        $user->numero_document = $request->get('numero_document');
        $user->sexe = $request->get('sexe');
        $user->telefon = $request->get('telefon');
        $user->id_rol = $request->get('id_rol');

        if ($dades->codi_seg_social != $request->get('codi_seg_social')) {
            $dades->codi_seg_social = $request->get('codi_seg_social');
        }

        if ($dades->num_nomina != $request->get('num_nomina')) {
            $dades->num_nomina = $request->get('num_nomina');
        }

        if ($dades->IBAN != $request->get('IBAN')) {
            $dades->IBAN = $request->get('IBAN');
        }

        $dades->especialitat = $request->get('especialitat');
        $dades->carrec = $request->get('carrec');
        $dades->data_inici_contracte = $request->get('data_inici_contracte');
        $dades->data_fi_contracte = $request->get('data_fi_contracte');
        $dades->id_horari = $request->get('id_horari');

        //use a transaction so IF the query fails it does not insert nor update the resources
        DB::transaction(function () use ($dades, $user) {

            $dades->save();

            $user->save();
        });

        return redirect('/gestio/empleats')->with('success', 'Empleat modificat correctament');
    }

    /**
     * Acció que desactiva un usuari empleat, si el usuari en questió és el que està en sessió, no es pot eliminar.
     *
     * @param  int  $id
     * @return /Illuminate/Http/Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if (auth()->user()->id != $user->id) {
            $dades_id = $user->id_dades_empleat;

            $dades = DadesEmpleat::findOrFail($dades_id);

            $user->delete();

            $dades->delete();
        } else {
            return redirect('/gestio/empleats')->with('error', 'No es pot desactivar aquest usuari');
        }

        return redirect('/gestio/empleats')->with('success', 'Empleat desactivat correctament');
    }

    /**
     * Acció que llista les dades dels usuaris empleats desactivats.
     * 
     * @return /Illuminate/Http/Response
     */
    public function trashed()
    {
        $users = User::onlyTrashed()
            ->whereNotNull('email_verified_at')
            ->where('id_rol', '!=', 1)
            ->whereNotNull('id_dades_empleat')
            ->join('dades_empleats', 'dades_empleats.id', 'users.id_dades_empleat')
            ->join('rols', 'rols.id', 'users.id_rol')
            ->join('horaris', 'horaris.id', 'dades_empleats.id_horari')
            ->get([
                'users.id',
                'users.nom',
                'users.cognom1',
                'users.cognom2',
                'users.email',
                'users.password',
                'users.data_naixement',
                'users.adreca',
                'users.ciutat',
                'users.provincia',
                'users.codi_postal',
                'users.tipus_document',
                'users.numero_document',
                'users.sexe',
                'users.telefon',
                'users.cognom2',
                'users.id_rol',
                'dades_empleats.codi_seg_social as codi_seg_social',
                'dades_empleats.num_nomina as num_nomina',
                'dades_empleats.IBAN as IBAN',
                'dades_empleats.especialitat as especialitat',
                'dades_empleats.carrec as carrec',
                'dades_empleats.data_inici_contracte as data_inici_contracte',
                'dades_empleats.data_fi_contracte as data_fi_contracte',
                'horaris.torn as id_horari',
            ]);

        return view('gestio/empleats/deactivated', compact('users'));
    }

    /**
     * Acció que reactiva un usuari empleat desactivat.
     * 
     * @param int $id
     * @return /Illuminate/Http/Response
     */
    public function reactivate($id)
    {
        $user = User::onlyTrashed()
            ->where('id', $id)
            ->first();

        $dades_id = $user->id_dades_empleat;

        $dades = DadesEmpleat::onlyTrashed()
            ->where('id', $dades_id)
            ->restore();

        $user->restore();

        return redirect('/gestio/empleats')->with('success', 'Empleat restaurat correctament.');
    }

    /**
     * Acció que mostra les dades dels usuaris administradors.
     *
     * @return /Illuminate/Http/Response
     */
    public function admins()
    {
        $users = User::whereNotNull('email_verified_at')
            ->where('id_rol', 2)
            ->where('users.id', '!=', auth()->user()->id)
            ->whereNotNull('id_dades_empleat')
            ->leftJoin('dades_empleats', 'dades_empleats.id', 'users.id_dades_empleat')
            ->leftJoin('rols', 'rols.id', 'users.id_rol')
            ->leftJoin('horaris', 'horaris.id', 'dades_empleats.id_horari')
            ->get([
                'users.id',
                'users.nom',
                'users.cognom1',
                'users.cognom2',
                'users.email',
                'users.password',
                'users.data_naixement',
                'users.adreca',
                'users.ciutat',
                'users.provincia',
                'users.codi_postal',
                'users.tipus_document',
                'users.numero_document',
                'users.sexe',
                'users.telefon',
                'users.cognom2',
                'users.id_rol',
                'dades_empleats.codi_seg_social as codi_seg_social',
                'dades_empleats.num_nomina as num_nomina',
                'dades_empleats.IBAN as IBAN',
                'dades_empleats.especialitat as especialitat',
                'dades_empleats.carrec as carrec',
                'dades_empleats.data_inici_contracte as data_inici_contracte',
                'dades_empleats.data_fi_contracte as data_fi_contracte',
                'horaris.torn as id_horari',
            ]);

        return view('gestio/empleats/admins', compact('users'));
    }

    /**
     * Acció que exporta els empleats en format PDF.
     * 
     * @return PDF
     */
    public function generarPDF()
    {
        $empleats = User::whereNotNull('email_verified_at')
            ->where('id_rol', '!=', 1)
            ->whereNotNull('id_dades_empleat')
            ->leftJoin('dades_empleats', 'dades_empleats.id', 'users.id_dades_empleat')
            ->leftJoin('rols', 'rols.id', 'users.id_rol')
            ->leftJoin('horaris', 'horaris.id', 'dades_empleats.id_horari')
            ->get([
                'users.id',
                'users.nom',
                'users.cognom1',
                'users.cognom2',
                'users.email',
                'users.password',
                'users.data_naixement',
                'users.adreca',
                'users.ciutat',
                'users.provincia',
                'users.codi_postal',
                'users.tipus_document',
                'users.numero_document',
                'users.sexe',
                'users.telefon',
                'users.cognom2',
                'users.id_rol',
                'dades_empleats.codi_seg_social as codi_seg_social',
                'dades_empleats.num_nomina as num_nomina',
                'dades_empleats.IBAN as IBAN',
                'dades_empleats.especialitat as especialitat',
                'dades_empleats.carrec as carrec',
                'dades_empleats.data_inici_contracte as data_inici_contracte',
                'dades_empleats.data_fi_contracte as data_fi_contracte',
                'horaris.torn as id_horari',
            ]);
        $mytime = Carbon\Carbon::now();
        $temps = $mytime->toDateString();

        try {
            $pdf = PDF::loadView('/gestio/empleats/pdfEmpleats', compact('empleats'));
        } catch (Exception $e) {
            return abort(404);
        }

        return $pdf->download('LlistatEmpleats_' . $temps . '.pdf');
    }
}
