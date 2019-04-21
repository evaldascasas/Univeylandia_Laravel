<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use \App\Venta_productes;
use Auth;
use PDF;
use File;

class GenerateFacturaPDFJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $id_venta;
    protected $usuari;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id_venta, $usuari)
    {
        $this->id_venta = $id_venta;
        $this->usuari = $usuari;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $venta_pdf = Venta_productes::where('venta_productes.id', '=', $this->id_venta)
      ->join('linia_ventes', 'linia_ventes.id_venta', '=', 'venta_productes.id')
      ->join('productes', 'productes.id', '=', 'linia_ventes.producte')
      ->join('atributs_producte', 'productes.atributs', '=', 'atributs_producte.id')
      ->join('tipus_producte', 'tipus_producte.id', '=', 'atributs_producte.nom')
      ->get([
        'venta_productes.id as id',
        'tipus_producte.nom as tipus_producte',
        'atributs_producte.tickets_viatges as tickets_viatges',
        'atributs_producte.foto_path as foto_path',
        'atributs_producte.preu as preu',
        'linia_ventes.quantitat as quantitat',
        'venta_productes.preu_total as preu_total',
        'venta_productes.created_at as created_at'
      ]);

      $user_vista = $this->usuari;

      $temps = Carbon::now()->toDateString();

      $factures_dir_creacio = public_path().'/storage/factures_compra/';

      $factures_dir = 'storage/factures_compra/';

      if( ! File::exists($factures_dir_creacio)) {
          File::makeDirectory($factures_dir_creacio, 0777, true);
      }

      $ruta_factura_pdf_update = $factures_dir.'univeylandia_compra_'.time().'.pdf';

      $ruta_factura_pdf_final = public_path().'/'.$ruta_factura_pdf_update;

      $pdf = PDF::loadView('/factura_pdf', compact('venta_pdf', 'user_vista'))->save($ruta_factura_pdf_final);

      DB::table('venta_productes')
          ->where('id', $this->id_venta)
          ->update(['factura_pdf_path' => $ruta_factura_pdf_update]);

      //'univeylandia_compra'.$temps.'.pdf'
      /*FI GENERACIO FACTURA*/

      //Enviament del correu utilitzant un job en segón pla
      $details['email'] = $this->usuari->email;
      $details['factura_pdf'] = $ruta_factura_pdf_final;
      //dd(asset($details['factura_pdf']));
      dispatch(new \App\Jobs\SendEmailFacturaJob($details, $ruta_factura_pdf_final));
    }
}
