<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Image;

use \App\Atraccion;
use \App\TipusAtraccions;
use \App\Linia_ventes;
use \App\Linia_cistella;
use \App\Atributs_producte;
use \App\Venta_productes;
use \App\Cistella;
use \App\Producte;

use Auth;

class TendaController extends Controller
{
    /**
     * 
     */
    public function indexTenda()
    {
        return view ('tenda/tendaIndex');
    }
    
    /**
     * 
     */
    public function indexAtraccions()
    {
        $atraccionetes = TipusAtraccions::join('atraccions', 'atraccions.tipus_atraccio', 'tipus_atraccions.id')
        ->get([
          'tipus_atraccions.tipus as nom',
          'tipus_atraccions.id as id_tipus',
          'atraccions.nom_atraccio',
          'atraccions.tipus_atraccio',
          'atraccions.data_inauguracio',
          'atraccions.altura_min',
          'atraccions.altura_max',
          'atraccions.accessibilitat',
          'atraccions.acces_express',
          'atraccions.id',
          'atraccions.path',
          'atraccions.descripcio'
        ]);
        
        $atraccions = Atraccion::all();
        
        return view ('tenda/tendaFotos', compact('atraccionetes'));
    }

    /**
     * 
     */
    public function imprimirFotos($id)
    {
        $atributs = Atributs_producte::where('id_atraccio',$id)
        ->join('atraccions','id_atraccio','atraccions.id')
        ->get([
            'atributs_producte.id as id',
			'atributs_producte.foto_path as foto_path',
			'atributs_producte.foto_path_aigua as foto_path_aigua',
			// 'atributs_producte.thumbnail as thumbnail',
            'atraccions.nom_atraccio as nom_atraccio',
            'atraccions.created_at as created_at',
        ]);

        $atraccio = Atraccion::where('id',$id)->first();
        
        return view ('/tenda/galeria', compact(['atributs','atraccio']));
    }

    /**
     * 
     */
    public function afegir_Foto($id)
    {
        
        //Busco ID producte
        $atributs_producte = Atributs_producte::find($id);
        
        $producte = Producte::where('atributs',$atributs_producte->id)
        ->first();

        //Comprobo si existeix la cistella i si no existeix la creo i si existeix faig l'insert a cistelles
        if ( Cistella::where('id_usuari',Auth::id() )->count() > 0) {

            $cistella = Cistella::where('id_usuari', Auth::id())
            ->first();

            //faig insert a linia cistella              
            $linia_cistella = new Linia_cistella([
                'id_cistella' => $cistella->id,
                'producte' => $producte->id,
                'quantitat' => 1
            ]);
            
            $linia_cistella ->save();
            
            /*Creem la cistella si no existeix*/
        } else {

            //creo la cistella
            $cistella = new Cistella([
                'id_usuari' => Auth::id()
            ]);
            
            $cistella ->save();
  
            //faig l'insert a linia cistella
            $linia_cistella = new Linia_cistella([
                'id_cistella' => $cistella->id,
                'producte' => $producte->id,
                'quantitat' => 1
            ]);
  
            $linia_cistella ->save();
        }
                
        return redirect('/cistella')->with('success', 'Foto afegida a la cistella correctament');
    }


}
