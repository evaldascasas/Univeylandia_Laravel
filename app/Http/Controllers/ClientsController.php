<?php

namespace App\Http\Controllers;

use \App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Exports\ClientsExport;
use App\Imports\ClientsImport;
use Maatwebsite\Excel\Facades\Excel;

use Image;
use PDF;
use Carbon;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $usuaris = User::whereNotNull('email_verified_at')
       ->where('id_rol',1)
       ->get();

       return view("gestio/clients/index", compact("usuaris"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gestio/clients/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $randomPass = str_random(16);

        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'cognom1' => ['required', 'string', 'max:255'],
            'cognom2' => ['string', 'max:255','nullable'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'date' => ['required', 'date'],
            'adreca' => ['required', 'string'],
            'ciutat' => ['required', 'string'],
            'provincia' => ['required', 'string'],
            'cp' => ['required', 'string'],
            'tipus_document' => ['required','in:DNI,NIE'],
            'numero_document' => ['required'],
            'sexe' => ['required','in:Home,Dona'],
            'telefon' => ['required','numeric','min:9'],
        ]);

        $usuari = new User ([
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
        
        if($usuari->save()) {
            // $token = app(\Illuminate\Auth\Passwords\PasswordBroker::class)->createToken($usuari);

            // $usuari->sendPasswordResetNotification($token);   
            dispatch(new \App\Jobs\SendEmailOnUserCreationJob($usuari));
        }

        return redirect('/gestio/clients')->with('success', 'Client creat correctament');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $usuari = User::findOrFail($id);

       return view('gestio/clients/show', compact('usuari'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $usuari = User::findOrFail($id);

       return view('gestio/clients/edit', compact('usuari'));
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
            'nom' => ['required', 'string', 'max:255'],
            'cognom1' => ['required', 'string', 'max:255'],
            'cognom2' => ['string', 'max:255','nullable'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'date' => ['required', 'date'],
            'adreca' => ['required', 'string'],
            'ciutat' => ['required', 'string'],
            'provincia' => ['required', 'string'],
            'cp' => ['required', 'string'],
            'tipus_document' => ['required','in:DNI,NIE'],
            'numero_document' => ['required'],
            'sexe' => ['required','in:Home,Dona'],
            'telefon' => ['required','numeric','min:9'],
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

        if($usuari->email != $request->get('email')) {
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();
        
        return redirect('/gestio/clients')->with('success', 'Client desactivat correctament');
    }

    /**
     * List all the trashed clients.
     * 
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $users = User::onlyTrashed()
        ->whereNotNull('email_verified_at')
        ->where('id_rol',1)
        ->get();
    
        return view('gestio/clients/deactivated', compact('users'));
    }

    /**
     * Reactivate a trashed employee.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function reactivate($id)
    {
        $user = User::onlyTrashed()
        ->where('id',$id)
        ->first();

        $user->restore();

        return redirect('/gestio/clients')->with('success', 'Client restaurat correctament.');
    }

    /**
     * Permanently delete a client.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function annihilate($id)
    {
        $user = User::onlyTrashed()
        ->where('id',$id)
        ->first();

        $user->forceDelete();

        return redirect('/gestio/clients/deactivated')->with('success', 'Client eliminat de la base de dades correctament.');
    }

    /**
     * Generate a PDF with client data.
     * 
     * @return PDF
     */
    public function guardarClientPDF() 
    {
        $usuaris = User::whereNotNull('email_verified_at')
        ->where('id_rol',1)
        ->get();

        $mytime = Carbon\Carbon::now();
        $temps = $mytime->toDateString();

        $pdf = PDF::loadView('/gestio/clients/pdfClient', compact('usuaris'))->setPaper('a3', 'landscape');

        return $pdf->download('client'.$temps.'.pdf');
    }

    /**
     * Generate a CSV file with client data
     * 
     * @return CSV
     */
    public function exportCSV()
    {
        $mytime = Carbon\Carbon::now();

        $temps = $mytime->toDateString();

        return Excel::download(new ClientsExport, 'clients'.$temps.'.csv');
    }

    /**
     * Import client data with a CSV file
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function importCSV(Request $request)
    {
        // $ext = $request('csv')->getClientOriginalExtension();

        // dd($request->file('file'));

        $request->validate([
            'file' => ['file','required'],
        ]);

        if($request->hasFile('file')) {
            try {
                Excel::import(new ClientsImport, $request->file('file'));
            
                return redirect('/gestio/clients')->with('success', 'Clients importats de forma correcta');
            }
            catch(Exception $e) {
                return redirect()->back()->with('errors', 'Error: '.$e);
            }
            
        }

        
    }

}
