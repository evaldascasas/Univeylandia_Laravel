<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Auth;
use View;
use Response;

use \App\Linia_ventes;
use \App\User_entra_atraccio;
use \App\Venta_productes;
use \App\producte;
use \App\Atributs_producte;
use \App\User;

class PerfilController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //Add Verified middleware
        //$this->middleware(['auth', 'verified']);
    }

    /**
     * Mostrar totes els productes que ha comprat l'usuari.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tickets = Venta_productes::where('id_usuari', Auth::id())
            ->join('linia_ventes', 'linia_ventes.id_venta', '=', 'venta_productes.id')
            ->join('productes', 'linia_ventes.producte', '=', 'productes.id')
            ->join('atributs_producte', 'atributs_producte.id', '=', 'productes.atributs')
            ->join('tipus_producte', 'tipus_producte.id', '=', 'atributs_producte.nom')
            ->whereIn('tipus_producte.id', array(1, 2, 3, 4, 5, 6, 7))
            ->where('atributs_producte.tickets_viatges', '>', 0)
            ->where('productes.estat', '=', 1)
            ->where(function ($tickets) {
                $tickets->whereNull('atributs_producte.data_entrada')
                    ->orwhereRaw('ABS(TIMESTAMPDIFF(DAY, atributs_producte.data_entrada, NOW())) <= 0');
            })
            //->limit(1)
            ->get([
                'atributs_producte.id as id',
                'linia_ventes.created_at as data_compra',
                'atributs_producte.foto_path as codi_qr',
                'tipus_producte.nom as tipus_producte',
                'atributs_producte.tickets_viatges as viatges',
            ]);

        $fotos = Venta_productes::where('id_usuari', Auth::id())
            ->join('linia_ventes', 'linia_ventes.id_venta', '=', 'venta_productes.id')
            ->join('productes', 'linia_ventes.producte', '=', 'productes.id')
            ->join('atributs_producte', 'atributs_producte.id', '=', 'productes.atributs')
            ->join('tipus_producte', 'tipus_producte.id', '=', 'atributs_producte.nom')
            ->join('atraccions', 'atraccions.id', '=', 'atributs_producte.id_atraccio')
            ->where('tipus_producte.id', '=', '8')
            ->where('productes.estat', '=', '1')
            ->get([
                'atributs_producte.id as id',
                'productes.created_at as created_at',
                'linia_ventes.created_at as data_compra',
                'atributs_producte.foto_path as foto_path',
                'atributs_producte.foto_path as foto_path_aigua',
                'atributs_producte.thumbnail as thumbnail',
                'tipus_producte.nom as tipus_producte',
                'atraccions.nom_atraccio as nom_atraccio',
            ]);


        //return Response::download('storage/tickets_parc/15544714436.png');
        return view('perfil', compact('tickets', 'fotos'));
    }

    /**
     * Acció que permet descarregar una imatge o entrada.
     * 
     * @param int $id
     * @return /Illuminate/Http/Response;
     */
    public function imgDownload($id)
    {
        $foto = Atributs_producte::find($id);

        return Response::download($foto->foto_path);
    }

    /**
     * Retorna la vista per editar el perfil d'usuari.
     * 
     * @return /Illuminate/Http/Response;
     */
    public function edit()
    {
        $perfil = User::findOrFail(Auth::id());

        return view('perfil/edit', compact('perfil'));
    }

    /**
     * Reatlitza l'actualització de les dades del perfil d'usuari.
     */
    public function update(Request $request)
    {
        $request->validate([
            'nom' => 'required|alpha',
            'cognom1' => 'required|alpha',
            'cognom2' => 'alpha',
            'telefon' => 'required|numeric',
            'adreca' => 'required',
            'ciutat' => 'required|alpha',
            'provincia' => 'required|alpha',
            'codi_postal' => 'required|numeric',
        ]);

        $perfil = User::findOrFail(Auth::id());

        $perfil->nom = $request->get('nom');
        $perfil->cognom1 = $request->get('cognom1');
        $perfil->cognom2 = $request->get('cognom2');
        $perfil->telefon = $request->get('telefon');
        $perfil->adreca = $request->get('adreca');
        $perfil->ciutat = $request->get('ciutat');
        $perfil->provincia = $request->get('provincia');
        $perfil->codi_postal = $request->get('codi_postal');

        $perfil->update();

        return redirect('/perfil')->with('success', 'Perfil actualitzat correctament');
    }

    /**
     * Retorna la vista amb el formulari per modificar la contrasenya de l'usuari.
     */
    public function editPassword()
    {
        return view('/perfil/password');
    }

    /**
     * Acció que realitza l'actualització de la contrasenya de l'usuari.
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'password_old' => 'required',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required'
        ]);

        $user = User::find(Auth::id());

        if (Hash::check($request->get('password_old'), Auth::user()->password)) {

            $user->password = Hash::make($request->get('password'));

            $user->update();

        } else return redirect('/perfil/edit/password')->with('error', 'Error: Introdueix la contrasenya correcta');

        return redirect('/perfil')->with('success', 'Contrasenya actualitzada correctament');
    }

    /**
     * Acció que desactiva un usuari client o treballador, els administradors no poden ser borrats d'aquesta forma.
     */
    public function destroy()
    {
        $perfil = User::findOrFail(Auth::id());

        if ($perfil->id_rol == 2) {
            return redirect('/perfil')->with('error', 'No et pots desactivar sent gestor.');
        } else {
            $perfil->delete();

            Auth::logout();

            return redirect('/');
        }
    }
}
