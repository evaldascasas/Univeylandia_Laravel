<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Image;

use \App\Atraccion;
use \App\TipusAtraccions;
use \App\Linia_ventes;
use \App\Linia_cistella;
use \App\Atributs_producte;
use \App\Venta_productes;
use \App\Cistella;
use \App\Producte;
use \App\User_entra_atraccio;

use Auth;

class TendaController extends Controller
{
    /**
     *
     */
    public function indexTenda()
    {
        return view('tenda/tendaIndex');
    }

    /**
     *
     */
    public function indexAtraccions()
    {
        // $atraccionetes = TipusAtraccions::join('atraccions', 'atraccions.tipus_atraccio', 'tipus_atraccions.id')
        // ->get([
        //   'tipus_atraccions.tipus as nom',
        //   'tipus_atraccions.id as tipus_atraccio',
        //   'atraccions.id as id',
        //   'atraccions.nom_atraccio',
        //   'atraccions.data_inauguracio',
        //   'atraccions.altura_min',
        //   'atraccions.altura_max',
        //   'atraccions.accessibilitat',
        //   'atraccions.acces_express',
        //   'atraccions.path',
        //   'atraccions.descripcio'
        // ]);

        $atraccions = Atraccion::all();

        return view('tenda/tendaFotos', compact(['atraccions']));
    }

    /**
     *
     */
    public function imprimirFotos($id)
    {
        //$data_muntada_atraccio = new Carbon($ticket_atributs->data_entrada);

        //    selct * from user_entra_atraccio uea
        //    left join atributs_producte ap on uea.id_atraccio = ap.id_atraccio
        //    left join atraccion a on a.id = ap.id_atraccio
        //    where atributs_producte.nom = 8 and user_entra_atraccio.id_atraccio =
        $atributs = User_entra_atraccio::where('user_entra_atraccio.id_atraccio', $id)
            ->join('atraccions', 'user_entra_atraccio.id_atraccio', 'atraccions.id')
            ->join('atributs_producte', 'atributs_producte.id_atraccio', 'user_entra_atraccio.id_atraccio')
            ->join('productes', 'productes.atributs', 'atributs_producte.id')
            ->where('atributs_producte.nom', '=', 8)
            ->whereNotExists(function ($atributs) {
                $atributs->select(DB::raw(1))
                    ->from('linia_ventes')
                    ->join('venta_productes', 'venta_productes.id', '=', 'linia_ventes.id_venta')
                    ->where('venta_productes.id_usuari', '=', Auth::id())
                    ->whereRaw('productes.id = linia_ventes.producte');
            })
            ->whereRaw('ABS(TIMESTAMPDIFF(MINUTE, user_entra_atraccio.created_at , atributs_producte.created_at)) >= 0')
            ->whereRaw('ABS(TIMESTAMPDIFF(MINUTE, user_entra_atraccio.created_at , atributs_producte.created_at)) <= 7')
            ->orderBy('atributs_producte.id', 'DESC')
            ->distinct('productes.id')
            ->get([
                'productes.id as id',
                'atributs_producte.foto_path as foto_path',
                'atributs_producte.foto_path_aigua as foto_path_aigua',
                'atraccions.nom_atraccio as nom_atraccio',
                'atraccions.created_at as created_at',
            ]);

        $atraccio = Atraccion::findOrFail($id);

        //Antiga query per a retornar les fotos d'atraccions
        //  $atributs = Atributs_producte::where('id_atraccio',$id)
        //  ->join('atraccions','id_atraccio','atraccions.id')
        //  ->get([
        //      'atributs_producte.id as id',
        // 	'atributs_producte.foto_path as foto_path',
        // 	'atributs_producte.foto_path_aigua as foto_path_aigua',
        // 	// 'atributs_producte.thumbnail as thumbnail',
        //      'atraccions.nom_atraccio as nom_atraccio',
        //      'atraccions.created_at as created_at',
        //  ]);
        //7 minuts atraccio mostrar fotos desde validació

        return view('tenda/galeria', compact(['atributs', 'atraccio']));
    }

    /**
     *
     */
    public function afegir_Foto($id)
    {
        //Busco ID producte
        $atributs_producte = Atributs_producte::findOrFail($id);

        $producte = Producte::where('atributs', $atributs_producte->id)
            ->first();

        //Comprobo si existeix la cistella i si no existeix la creo i si existeix faig l'insert a cistelles
        if (Cistella::where('id_usuari', Auth::id())->count() > 0) {

            $cistella = Cistella::where('id_usuari', Auth::id())
                ->first();

            //faig insert a linia cistella
            $linia_cistella = new Linia_cistella([
                'id_cistella' => $cistella->id,
                'producte' => $producte->id,
                'quantitat' => 1
            ]);

            $linia_cistella->save();

            /*Creem la cistella si no existeix*/
        } else {

            //creo la cistella
            $cistella = new Cistella([
                'id_usuari' => Auth::id()
            ]);

            $cistella->save();

            //faig l'insert a linia cistella
            $linia_cistella = new Linia_cistella([
                'id_cistella' => $cistella->id,
                'producte' => $producte->id,
                'quantitat' => 1
            ]);

            $linia_cistella->save();
        }

        return redirect('/cistella')->with('success', 'Foto afegida a la cistella correctament');
    }
}
