<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use \App\Linia_ventes;
use Auth;
use PDF;
use File;

class GenerateExportacioPDFVentesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $usuari;
    protected $dates2;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($usuari, $dates)
    {
        $this->usuari = $usuari;
        $this->dates2 = $dates;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $dates = $this->dates2;
      $start_date = Carbon::createFromFormat('d/m/Y', $dates[0])->hour(0)->minute(0)->second(0)->format('Y-m-d H:i:s');
      $end_date = Carbon::createFromFormat('d/m/Y', $dates[1])->hour(23)->minute(59)->second(59)->format('Y-m-d H:i:s');

      $start_date_exportacio = Carbon::createFromFormat('d/m/Y', $dates[0])->format('d-m-Y');
      $end_date_exportacio = Carbon::createFromFormat('d/m/Y', $dates[1])->format('d-m-Y');
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

      $temp_folder = public_path().'/storage/temp_pdf/';
      if( ! File::exists($temp_folder)) {
          File::makeDirectory($temp_folder, 0777, true);
      }
      $ids_ventes = $ventes->pluck('id')->toArray();
      $productes_venuts = Linia_ventes::whereIn('id_venta', $ids_ventes)->get()->count();
      $arxiu_exportacio = $temp_folder.'ventes_'.$start_date_exportacio.'_'.$end_date_exportacio.'.pdf';
      $pdf = PDF::loadView('/gestio/ventes/exportPDF', compact('ventes', 'total', 'dates', 'numero_ventes', 'productes_venuts'))->save($arxiu_exportacio);
      $correu_user = $this->usuari->email;
      dispatch(new \App\Jobs\SendEmailVentesJob($arxiu_exportacio, $correu_user));
    }
}
