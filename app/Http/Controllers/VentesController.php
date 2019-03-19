<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

use \App\producte;
use \App\Tipus_producte;
use \App\Atributs_producte;
use \App\Cistella;
use \App\Linia_cistella;
use \App\Venta_productes;
use \App\Linia_ventes;

class VentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $ventes = DB::table('venta_productes')
          ->join('users', 'users.id', '=', 'venta_productes.id_usuari')
          ->select('venta_productes.id as id', 'venta_productes.id_usuari as id_usuari' ,'venta_productes.preu_total as preu', 'venta_productes.estat as estat', 'venta_productes.created_at as temps_compra', 'users.nom as nom', 'users.cognom1 as cognom1', 'users.cognom2 as cognom2', 'users.email as email', 'users.numero_document as numero_document')
          ->paginate(10);
        return view('gestio/ventes/index', compact('ventes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      //$venta_producte = Venta_productes::find($id);
      $preu_linia = 0;
      $ventes = DB::table('venta_productes')
          ->join('linia_ventes', 'linia_ventes.id_venta', '=', 'venta_productes.id')
          ->join('productes', 'productes.id', '=', 'linia_ventes.producte')
          ->join('atributs_producte', 'atributs_producte.id', '=', 'productes.atributs')
          ->join('tipus_producte', 'tipus_producte.id', '=', 'atributs_producte.nom')
          ->select('productes.id as id' ,'tipus_producte.nom as nom', 'tipus_producte.id as tid', 'atributs_producte.mida as mida','atributs_producte.tickets_viatges as tickets_viatges','atributs_producte.foto_path as foto_path','atributs_producte.foto_path_aigua as foto_path_aigua','atributs_producte.preu as preu','productes.descripcio as descripcio','productes.estat as estat', 'tipus_producte.preu_base as preu_base', 'linia_ventes.quantitat as quantitat', 'venta_productes.preu_total as preu_total')
          ->where('linia_ventes.id_venta', '=', $id)
          ->get();
        return view('gestio.ventes.edit', compact('ventes', 'preu_linia'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
