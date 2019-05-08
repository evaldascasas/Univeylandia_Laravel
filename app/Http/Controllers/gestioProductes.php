<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Carbon\Carbon;
//use Illuminate\Support\Facades\Storage;
use Storage;
use File;

use \App\Producte;
use \App\Tipus_producte;
use \App\Atributs_producte;
use \App\Atraccion;
use \App\User_entra_atraccio;
use \App\Linia_ventes;
use \App\Venta_productes;

class gestioProductes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('nom_search')) {
          $reeee = $request->get('nom_search');
        }else {
          $reeee = "";
        }
        
        $tipus_producte = Tipus_producte::all();

        $productes = DB::table('productes')
        ->join('atributs_producte', 'atributs_producte.id', '=', 'productes.atributs')
        ->join('tipus_producte', 'tipus_producte.id', '=', 'atributs_producte.nom')
        ->select('productes.id as id' ,'tipus_producte.nom as nom', 'tipus_producte.id as tid', 'atributs_producte.mida as mida','atributs_producte.tickets_viatges as tickets_viatges','atributs_producte.foto_path as foto_path','atributs_producte.foto_path_aigua as foto_path_aigua','atributs_producte.preu as preu','productes.descripcio as descripcio','productes.estat as estat', 'tipus_producte.preu_base as preu_base')
        ->where(function ($productes) use ($reeee) {
            $productes->where('atributs_producte.preu', '=', $reeee)
            ->orWhere('productes.descripcio', 'like', '%'.$reeee.'%');
        })
        ->orderBy('estat', 'DESC')
        ->orderBy('nom', 'ASC');

        if ($request->has('tipus')) {
            $tipus_search = $request->get('tipus');
            if ($tipus_search == -1) {} 
            else { $productes->where('tipus_producte.id', '=', $tipus_search); }
        } else { $tipus_search = null; }
        if ($request->has('estat')) {
            $estat_search = $request->get('estat');
            if ($estat_search == -1) {} 
            else { $productes->where('productes.estat', '=', $estat_search); }
        } else {
            $estat_search = null;
        }
        
        $tipus_producte_seleccionat = Tipus_producte::find($tipus_search);
        
        $productes = $productes->paginate(10);

        return view('gestio.gestioProductes.index', compact('productes', 'reeee', 'tipus_producte', 'tipus_search', 'tipus_producte_seleccionat', 'estat_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipus_producte = Tipus_producte::all();
        
        return view('gestio.gestioProductes.create', compact('tipus_producte'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
      
        $file = $request->file('image');
      
        $file_name = time() . $file->getClientOriginalName();
      
        $file_path = 'storage/productes';
        
        $file->move($file_path, $file_name);
        
        $preu_base = Tipus_producte::find($request->get('tipus'))->preu_base;

        $preu_final = $request->get('preu') +$preu_base;
        
        $atributs_producte = new Atributs_producte([
            'nom' => $request->get('tipus'),
            'mida' => $request->get('mida'),
            'tickets_viatges' => $request->get('tickets_viatges'),
            'preu' => $preu_final,
            'foto_path' => "/".$file_path."/".$file_name
        ]);

        $atributs_producte->save();

        $producte = new producte([
            'atributs' => $atributs_producte->id,
            'descripcio' => $request->get('descripcio'),
            'estat' => $request->get('estat')
        ]);
        
        $producte->save();
        
        return redirect('/gestio/productes')->with('success', 'Producte registrat correctament');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('gestio/gestioProductes/show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producte = Producte::find($id);
        
        $atributs_producte = Atributs_producte::find($producte->atributs);
        
        $tipus_producte = Tipus_producte::find($atributs_producte->nom);
        
        $tipus_producte_list = DB::table('tipus_producte')
        ->whereRaw('id != ?', [$tipus_producte->id])
        ->get();
        
        return view('gestio.gestioProductes.edit', compact('producte', 'atributs_producte', 'tipus_producte', 'tipus_producte_list'));
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
        $producte = Producte::find($id);
        $producte->descripcio = $request->get('descripcio');
        $producte->estat = $request->get('estat');
        $producte->save();

        $atributs_producte = Atributs_producte::find($producte->atributs);
        $atributs_producte->nom = $request->get('tipus');
        $atributs_producte->mida = $request->get('mida');
        $atributs_producte->tickets_viatges = $request->get('tickets_viatges');
        $atributs_producte->preu = $request->get('preu');
        
        if ($request->has('image')) {
            $image_path = public_path().$atributs_producte->foto_path;
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            
            request()->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            
            $file = $request->file('image');
            $file_name = time() . $file->getClientOriginalName();
            $file_path = 'storage/productes';
            $file->move($file_path, $file_name);
            
            $atributs_producte->foto_path = "/".$file_path."/".$file_name;
        }
        
        $atributs_producte->save();
        
        return redirect('/gestio/productes')->with('success', 'Producte modificat correctament');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producte = Producte::find($id);

        $atributs_producte = Atributs_producte::find($producte->atributs);

        if(File::exists($atributs_producte->foto_path)) {
            File::delete($atributs_producte->foto_path);
        }

        if(File::exists($atributs_producte->foto_path_aigua)) {
            File::delete($atributs_producte->foto_path_aigua);
        }

        if(File::exists($atributs_producte->thumbnail)) {
          File::delete($atributs_producte->thumbnail);
        }

        $producte->delete();

        $atributs_producte->delete();

        return redirect('/gestio/productes') ->with('success', 'Producte eliminat correctament');
    }

    public function guardarProductePDF ()
    {
        $tipus_producte = Tipus_producte::all();

        $productes = DB::table('productes')
            ->join('atributs_producte', 'atributs_producte.id', '=', 'productes.atributs')
            ->join('tipus_producte', 'tipus_producte.id', '=', 'atributs_producte.nom')
            ->select('productes.id as id' ,'tipus_producte.nom as nom', 'tipus_producte.id as tid', 'atributs_producte.mida as mida','atributs_producte.tickets_viatges as tickets_viatges','atributs_producte.foto_path as foto_path','atributs_producte.foto_path_aigua as foto_path_aigua','atributs_producte.preu as preu','productes.descripcio as descripcio','productes.estat as estat', 'tipus_producte.preu_base as preu_base')
            ->orderBy('estat', 'DESC')
            ->orderBy('nom', 'ASC');

        $mytime = Carbon\Carbon::now();
        $temps = $mytime->toDateString();

        $atraccions = AssignacioAtraccion::all();
        $pdf = PDF::loadView('/gestio/atraccions/pdfProductes', compact('productes', 'reeee', 'tipus_producte', 'tipus_search', 'tipus_producte_seleccionat', 'estat_search'));
        return $pdf->download('productes'.$temps.'.pdf');
    }

    public function validacio()
    {
        $atraccions = Atraccion::all();
        
        return view('validacio', compact('atraccions'));
    }

    public function validar(Request $request)
    {
        if (Producte::find($request->get('ticket')) != null && Linia_ventes::where('producte', $request->get('ticket'))->first() != null) {
            $valid = false;
            $user_venta_ticket = null;
            $ticket = Producte::find($request->get('ticket'));
            $ticket_atributs = Atributs_producte::find($ticket->atributs);
            $tipus_ticket = Tipus_producte::find($ticket_atributs->nom);
            
            $localitzacio_validacio = $request->get('atraccio_selector'); //Únicament s'utilitza per a comprovar si la validació es a una atracció o a la entrada del parc.
            $tipus_cua = $request->get('tipus_cua_selector'); // 0 == Normal | 1 == Express
            $error = 'Ticket invalid';
            $success = 'Ticket valid';
            $data_validacio_ticket = new Carbon($ticket_atributs->data_entrada);
            $data_validacio_ticket->hour(0)->minute(0)->second(0);
            $data_actual = Carbon::now(new \DateTimeZone('Europe/Madrid'));
            $data_actual->hour(0)->minute(0)->second(0);
            $data_actual_update = Carbon::now(new \DateTimeZone('Europe/Madrid'));
            $atraccio_seleccionada = null;
            
            //Si es un ticket
            if ($ticket_atributs->nom == 1 || $ticket_atributs->nom == 2 || $ticket_atributs->nom ==3 || $ticket_atributs->nom == 4 || $ticket_atributs->nom == 5 || $ticket_atributs->nom == 6 || $ticket_atributs->nom == 7) {
                //Si es la entrada al parc
                if ($localitzacio_validacio == -1) {
                    //Si la data de validació es superior o igual a 1 día a la data actual
                    if ($data_validacio_ticket->diff($data_actual)->days > 0){
                        if (($ticket_atributs->nom == 6 || $ticket_atributs->nom == 7) && $ticket->estat == 1 && $ticket_atributs->tickets_viatges <=0) { //ticket viatges a la entrada
                            $error = "T'has quedat sense viatges i la data d'entrada ha superat un día.";
                        } else {
                            $error = 'Un ticket general o express unicament es valid per a un día';
                        }
                    } else { //Es crea el registre d'entrada amb la data actual
                        DB::table('atributs_producte')
                        ->where('id', $ticket_atributs->id)
                        ->update(['data_entrada' => $data_actual_update->toDateTimeString()]);
                        
                        $valid = true;
                        $ticket_atributs = Atributs_producte::find($ticket->atributs);
                    }
                } else { //Si es la validació a una atracció
                    if (($ticket_atributs->data_entrada == null || $data_validacio_ticket->diff($data_actual)->days > 0) && ($ticket_atributs->nom != 6 || $ticket_atributs->nom != 7)) { //comprova que s'haigue validat a la entrada del parc i que no s'intente colar una entrada ja utilitzada anteriorment. La regla del temps no s'aplica als tickets de viatges
                        if ($ticket_atributs->data_entrada == null) {
                            $error = 'La validació del ticket es te que realitzar primerament a la entrada del parc.';
                        } else {
                            $error = 'Que fas intentant colar un ticket ja utilitzat?';
                        }
                    } else {
                        //Si es express
                        if (($ticket_atributs->nom == 4 || $ticket_atributs->nom == 5) && $ticket->estat == 1) {
                            $valid = true;
                        }
                        //Si es de viatges
                        elseif (($ticket_atributs->nom == 6 || $ticket_atributs->nom == 7) && $ticket->estat == 1) {
                            if ($tipus_cua == 0 && $ticket_atributs->tickets_viatges > 0) {
                                DB::table('atributs_producte')
                                ->where('id', $ticket_atributs->id)
                                ->update(['tickets_viatges' => $ticket_atributs->tickets_viatges - 1]);
                                $valid = true;
                                $ticket_atributs = Atributs_producte::find($ticket->atributs);
                            } else {
                                if ($ticket_atributs->tickets_viatges <= 0) {
                                    $error = "T'has quedat sense viatges, a pagar";
                                } else {
                                    $error = "Els tickets de viatges no poden accedir a la cua express";
                                }
                            }
                        }
                        //Si es general
                        elseif(($ticket_atributs->nom == 1 || $ticket_atributs->nom == 2) && $ticket->estat == 1){
                            if ($tipus_cua == 0) {
                                $valid = true;
                            } else {
                                $error = "Els tickets generals no poden accedir a la cua express";
                            }
                        } else { //Si es un ticket de nado, no es pot validar a les atraccions. Mostrar missatge d'error informatiu
                            $error = 'Un nado pot muntar sense validació. La validació es fa a la entrade del pare/mare que munti amb ell.';
                        }
                    }
                }
            } 
            if ($localitzacio_validacio != -1) { //si la validació no es a la entrada del parc, retornem la atraccio.
                $atraccio_seleccionada = Atraccion::find($localitzacio_validacio);
            }
            if ($valid) {
                if ($localitzacio_validacio != -1) { //Si la validacio no ha sigut a la entrada del parc, es fa un insert en user_entra_atraccio
                    if ($linia_venta = Linia_ventes::where('producte', $ticket->id)->first()) { //Si el ticket pertany a un usuari (no s'ha venut a la taquilla)
                        $venta = Venta_productes::find($linia_venta->id_venta);
                        $user_venta_ticket = $venta->id_usuari;
                    }
                $user_atraccio = new User_entra_atraccio([
                    'id_usuari' => $user_venta_ticket,
                    'id_atraccio' => $localitzacio_validacio,
                    'id_ticket' => $ticket->id
                ]);
                
                $user_atraccio->save();
            }
            return redirect('/validacio')->with(compact('success', 'ticket', 'ticket_atributs', 'tipus_ticket', 'atraccio_seleccionada', 'tipus_cua'));
        } else {
            return redirect('/validacio')->with(compact('error', 'ticket', 'ticket_atributs', 'tipus_ticket', 'atraccio_seleccionada', 'tipus_cua'));
        }
    } else {
      $error = 'Ticket no trobat';
      $localitzacio_validacio = $request->get('atraccio_selector');
      $atraccio_seleccionada = null;
      $tipus_cua = $request->get('tipus_cua_selector');
      if ($localitzacio_validacio != -1) { //si la validació no es a la entrada del parc, retornem la atraccio.
        $atraccio_seleccionada = Atraccion::find($localitzacio_validacio);
      }
      return redirect('/validacio')->with(compact('error', 'atraccio_seleccionada', 'tipus_cua'));
    }
    }

}
