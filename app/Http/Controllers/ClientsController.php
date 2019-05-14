<?php

namespace App\Http\Controllers;

use \App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

use App\Exports\ClientsExport;
use App\Imports\ClientsImport;
use Maatwebsite\Excel\Facades\Excel;

use PDF;
use Carbon;

class ClientsController extends Controller
{
    /**
     * Acció que s'encarrega de mostrar un llistat de clients.
     *
     * @return /Illuminate/Http/Response
     */
    public function index()
    {
        $usuaris = User::whereNotNull('email_verified_at')
            ->where('id_rol', 1)
            ->get();

        return view("gestio.clients.index", compact("usuaris"));
    }

    /**
     * Acció que s'encarrega de mostrar el formulari de creació d'usuaris client.
     *
     * @return /Illuminate/Http/Response
     */
    public function create()
    {
        return view('gestio.clients.create');
    }

    /**
     * Acció que emmagatzema un usuari client en la base de dades. Si l'usuari s'emmagatzema de forma correcta, 
     * s'envia un correu electrònic amb un enllaç per restablir la contrasenya.
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
            'cognom2' => ['string', 'max:255', 'nullable'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'date' => ['required', 'date'],
            'adreca' => ['required', 'string'],
            'ciutat' => ['required', 'string'],
            'provincia' => ['required', 'string'],
            'cp' => ['required', 'string'],
            'tipus_document' => ['required', 'in:DNI,NIE'],
            'numero_document' => ['required'],
            'sexe' => ['required', 'in:Home,Dona'],
            'telefon' => ['required', 'numeric', 'min:9'],
        ]);

        $usuari = new User([
            'nom' => $request->get('nom'),
            'cognom1' => $request->get('cognom1'),
            'cognom2' => $request->get('cognom2'),
            'email' => $request->get('email'),
            'email_verified_at' => Carbon\Carbon::now(),
            'password' => Hash::make($randomPass),
            'data_naixement' => $request->get('date'),
            'adreca' => $request->get('adreca'),
            'ciutat' => $request->get('ciutat'),
            'provincia' => $request->get('provincia'),
            'codi_postal' => $request->get('cp'),
            'tipus_document' => $request->get('tipus_document'),
            'numero_document' => $request->get('numero_document'),
            'sexe' => $request->get('sexe'),
            'telefon' => $request->get('telefon'),
            'id_rol' => 1,
        ]);

        $usuari->save();

        if ($usuari->save()) {
            dispatch(new \App\Jobs\SendEmailOnUserCreationJob($usuari));
        }

        return redirect('/gestio/clients')->with('success', 'Client creat correctament');
    }

    /**
     * Acció que s'encarrega de mostrar les dades de l'usuari client especificat en un formulari no editable.
     *
     * @param  int  $id
     * @return /Illuminate/Http/Response
     */
    public function show($id)
    {
        $usuari = User::findOrFail($id);

        return view('gestio.clients.show', compact('usuari'));
    }

    /**
     * Acció que s'encarrega de mostrar el formulari per editar l'usuari client especificat amb les dades del client.
     *
     * @param  int  $id
     * @return /Illuminate/Http/Response
     */
    public function edit($id)
    {
        $usuari = User::findOrFail($id);

        return view('gestio.clients.edit', compact('usuari'));
    }

    /**
     * Acció que s'encarrega d'actualitzar la informació de l'usuari client especificat.
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
            'cognom2' => ['string', 'max:255', 'nullable'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'date' => ['required', 'date'],
            'adreca' => ['required', 'string'],
            'ciutat' => ['required', 'string'],
            'provincia' => ['required', 'string'],
            'cp' => ['required', 'string'],
            'tipus_document' => ['required', 'in:DNI,NIE'],
            'numero_document' => ['required'],
            'sexe' => ['required', 'in:Home,Dona'],
            'telefon' => ['required', 'numeric', 'min:9'],
        ]);

        $usuari = User::findOrFail($id);
        $usuari->nom = $request->get('nom');
        $usuari->cognom1 = $request->get('cognom1');
        $usuari->cognom2 = $request->get('cognom2');
        $usuari->tipus_document = $request->get('tipus_document');
        $usuari->numero_document = $request->get('numero_document');
        $usuari->data_naixement = $request->get('date');
        $usuari->sexe = $request->get('sexe');
        $usuari->telefon = $request->get('telefon');

        if ($usuari->email != $request->get('email')) {
            $usuari->email = $request->get('email');
        }

        $usuari->adreca = $request->get('adreca');
        $usuari->ciutat = $request->get('ciutat');
        $usuari->provincia = $request->get('provincia');
        $usuari->codi_postal = $request->get('cp');

        $usuari->save();

        return redirect('/gestio/clients')->with('success', 'Client modificat correctament');
    }

    /**
     * Acció que s'encarrega de desactivar l'usuari client especificat.
     *
     * @param  int  $id
     * @return /Illuminate/Http/Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect('/gestio/clients')->with('success', 'Client desactivat correctament');
    }

    /**
     * Acció que mostra un llistat dels usuaris client desactivats.
     * 
     * @return /Illuminate/Http/Response
     */
    public function trashed()
    {
        $users = User::onlyTrashed()
            ->whereNotNull('email_verified_at')
            ->where('id_rol', 1)
            ->get();

        return view('gestio.clients.deactivated', compact('users'));
    }

    /**
     * Acció que s'encarrega de reactivar l'usuari especificat.
     * 
     * @param int $id
     * @return /Illuminate/Http/Response
     */
    public function reactivate($id)
    {
        $user = User::onlyTrashed()
            ->where('id', $id)
            ->first();

        $user->restore();

        return redirect('/gestio/clients')->with('success', 'Client restaurat correctament.');
    }

    /**
     * Acció que s'encarrega de generar un arxiu PDF amb les dades de tots els usuaris client.
     * 
     * @return PDF
     */
    public function guardarClientPDF()
    {
        try {
            $usuaris = User::whereNotNull('email_verified_at')
                ->where('id_rol', 1)
                ->get();

            $mytime = Carbon\Carbon::now();
            $temps = $mytime->toDateString();

            $pdf = PDF::loadView('/gestio/clients/pdfClient', compact('usuaris'))->setPaper('a3', 'landscape');

            return $pdf->download('client' . $temps . '.pdf');
        } catch (\Exception $e) {
            Log::error($e);
            return redirect('/gestio/clients')->with('error', 'Ha fallat la exportació en PDF.');
        }
    }

    /**
     * Acció que s'encarrega de generar un arxiu CSV amb les dades importants dels usuaris client.
     * 
     * @return CSV
     */
    public function exportCSV()
    {
        $mytime = Carbon\Carbon::now();

        $temps = $mytime->toDateString();

        try {
            return Excel::download(new ClientsExport, 'clients' . $temps . '.csv');
        } catch (\Exception $e) {
            Log::error($e);
            return redirect('/gestio/clients')->with('error', 'Ha fallat la exportació dels registres.');
        }
    }

    /**
     * Acció que s'encarrega d'importar dades de clients d'un CSV a la base de dades.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return /Illuminate/Http/Response
     */
    public function importCSV(Request $request)
    {
        $file = $request->file('file');

        $request->validate([
            'file' => ['file', 'required', 'mimetypes:text/plain,text/csv,csv,application/csv'],
        ]);

        if ($request->hasFile('file')) {
            try {
                Excel::import(new ClientsImport, $request->file('file'));
            } catch (\Exception $e) {
                Log::error($e);
                return back()->with('error', 'Ha fallat la importació dels registres');
            }
            return redirect('/gestio/clients')->with('success', 'Clients importats de forma correcta');
        }
    }
}
