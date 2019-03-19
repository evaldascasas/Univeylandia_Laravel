<?php

namespace App\Http\Controllers;
use \App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $usuaris= User::where('email_verified_at','!=', null)->where('id_rol',1)->get();
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
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'cognom1' => ['required', 'string', 'max:255'],
            'cognom2' => ['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'contrasenya' => ['required', 'string', 'min:6'],
            'date' => ['required', 'date'],
            'adreca' => ['required', 'string'],
            'ciutat' => ['required', 'string'],
            'provincia' => ['required', 'string'],
            'cp' => ['required', 'string'],
            'tipus_document' => ['required'],
            'numero_document' => ['required'],
            'sexe' => ['required'],
            'telefon' => ['required', 'string'],
        ]);

        $usuari = new User ([
            'nom' => $request->get('nom'),
            'cognom1' => $request->get('cognom1'),
            'cognom2' => $request->get('cognom2'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('contrasenya')),
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
            'actiu' => 0,
        ]);
        
        $usuari->save();
        
        return view('gestio/clients/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $usuari=User::findOrFail($id);

       return view ('gestio/clients/show', compact('usuari'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $usuari=User::findOrFail($id);

       return view ('gestio/clients/edit', compact('usuari'));
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
      
      $usuari = User::findOrFail($id);
      
      $usuari->nom = $request->get('nom');
      $usuari->cognom1 = $request->get('cognom1');
      $usuari->cognom2 = $request->get('cognom2');
      $usuari->tipus_document = $request->get('tipus_document');
      $usuari->numero_document = $request->get('numero_document');
      $usuari->data_naixement = $request->get('date');
      $usuari->sexe = $request->get('sexe');
      $usuari->telefon = $request->get('telefon');
      $usuari->email = $request->get('email');
      $usuari->adreca = $request->get('adreca');
      $usuari->ciutat = $request->get('ciutat');
      $usuari->provincia = $request->get('provincia');
      $usuari->password = Hash::make($request->get('contrasenya'));
      $usuari->codi_postal = $request->get('cp');
      
      $usuari->update();

      return redirect('gestio/clients');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $usuaris=User::findOrFail($id);

      $usuaris->email_verified_at=null;
      $usuaris->save();

      return redirect('gestio/clients');
    }
}
