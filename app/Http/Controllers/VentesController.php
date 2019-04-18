<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;
use PDF;

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
          ->orderBy('id', 'DESC')
          ->paginate(10);

          //$start_date = Carbon::createFromFormat('d/m/Y', $dates[0])->hour(0)->minute(0)->second(0)->format('Y-m-d H:i:s');
      //$primer_dia_mes_form = Carbon::now()->startOfMonth()->toDateString();
      //dd($primer_dia_mes_form);
      $primer_dia_mes = Carbon::createFromFormat('Y-m-d', Carbon::now()->startOfMonth()->toDateString())->format('d-m-Y');
      $data_actual = Carbon::createFromFormat('Y-m-d', Carbon::now()->toDateString())->format('d-m-Y');
    //  $primer_dia_mes = Carbon::now()->startOfMonth();
      //$primer_dia_mes->format('d/m/Y');
      //dd($primer_dia_mes);
        return view('gestio/ventes/index', compact('ventes', 'primer_dia_mes', 'data_actual'));
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
    public function export_pdf(Request $request)
    {
        $dates = explode(' - ', $request->get('daterange'));
        $start_date = Carbon::createFromFormat('d/m/Y', $dates[0])->hour(0)->minute(0)->second(0)->format('Y-m-d H:i:s');
        $end_date = Carbon::createFromFormat('d/m/Y', $dates[1])->hour(23)->minute(59)->second(59)->format('Y-m-d H:i:s');
        $total = 0;
        //dd($start_date, $end_date);
        $ventes = DB::table('venta_productes')
            ->join('users', 'users.id', '=', 'venta_productes.id_usuari')
            ->select('venta_productes.id as id', 'venta_productes.id_usuari as id_usuari' ,'venta_productes.preu_total as preu', 'venta_productes.estat as estat', 'venta_productes.created_at as temps_compra', 'users.nom as nom', 'users.cognom1 as cognom1', 'users.cognom2 as cognom2', 'users.email as email', 'users.numero_document as numero_document')
            ->whereBetween('venta_productes.created_at',[$start_date,$end_date])
            ->orderBy('id', 'ASC')
            ->get();
        foreach ($ventes as $venta) {
          $total = $total + $venta->preu;
        }
        $numero_ventes = $ventes->count();
        if($numero_ventes == 0){
          return redirect('/gestio/ventes')->with('error', 'No hi han productes a exportar en aquest rang.');
        }else{
          $ids_ventes = $ventes->pluck('id')->toArray();
          $productes_venuts = Linia_ventes::whereIn('id_venta', $ids_ventes)->get()->count();
          $pdf = PDF::loadView('/gestio/ventes/exportPDF', compact('ventes', 'total', 'dates', 'numero_ventes', 'productes_venuts'));
          return $pdf->download('ventes_'.$dates[0].'-'.$dates[1].'.pdf');
        }
    }
}
