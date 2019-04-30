<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Atraccion;
use \App\TipusAtraccions;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Image;
use PDF;
use Carbon;
use \App\AssignacioAtraccion;


use \App\Horari;
use \App\Rol;
use \App\DadesEmpleat;
use \App\User;


class AtraccionsController extends Controller
{
    private $data_inici_global;
    private $data_fi_global;
    private $rol_treballador;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atraccionetes = TipusAtraccions::join('atraccions', 'atraccions.tipus_atraccio', '=', 'tipus_atraccions.id')
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
            'atraccions.descripcio',
        ]);

        $atraccions = Atraccion::all();

        return view('gestio/atraccions/index', compact('atraccionetes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipusAtraccions = TipusAtraccions::all();

        return view('gestio/atraccions/create', compact('tipusAtraccions'));
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
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
            'alturamin' => 'required|integer',
            'alturamax' => 'required|integer'
        ]);

        $file = $request->file('image');
        $file_name = time() . $file->getClientOriginalName();
        $file_path = 'storage/atraccions';
        $img = Image::make($file->getRealPath())->resize(1280, 720)->save($file_path."/".$file_name);

        $atraccio = new Atraccion([
            'nom_atraccio' => $request->get('nom'),
            'tipus_atraccio' => $request->get('tipusatraccio'),
            'data_inauguracio' => $request->get('datainauguracio'),
            'altura_min' => $request->get('alturamin'),
            'altura_max' => $request->get('alturamax'),
            'accessibilitat' => $request->get('accessible'),
            'acces_express' => $request->get('accesexpress'),
            'descripcio' => $request->get('descripcio'),
            'path' => "/".$file_path."/".$file_name,
        ]);

        $atraccio->save();

        return redirect('/gestio/atraccions')->with('success', 'atraccio afegida');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $atraccio = Atraccion::findOrFail($id);

        return view('gestio/atraccions/show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $atraccio = Atraccion::findOrFail($id);

        $tipus = TipusAtraccions::all();

        return view('gestio/atraccions/edit', compact('atraccio','tipus'));
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
        $atraccio = Atraccion::findOrFail($id);

        $atraccio->nom_atraccio = $request->get('nom');
        $atraccio->tipus_atraccio = $request->get('tipusatraccio');
        $atraccio->data_inauguracio = $request->get('datainauguracio');
        $atraccio->altura_min = $request->get('alturamin');
        $atraccio->altura_max = $request->get('alturamax');
        $atraccio->accessibilitat = $request->get('accessible');
        $atraccio->acces_express = $request->get('accesexpress');
        $atraccio->descripcio = $request->get('descripcio');

        if ($request->has('image')) {
            $image_path = public_path().$atraccio->path;
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('image');
            $file_name = time() . $file->getClientOriginalName();
            $file_path = 'storage/atraccions';
            $img = Image::make($file->getRealPath())->resize(1280, 720)
            ->save($file_path."/".$file_name);

            $atraccio->path = "/".$file_path."/".$file_name;
        }

        $atraccio->save();

        return redirect('/gestio/atraccions')->with('success', 'atraccio modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $atraccio = Atraccion::findOrFail($id);

        $atraccio->delete();

        return redirect('/gestio/atraccions')->with('success', 'Atracció eliminada correctament');
    }


    public function guardarPDF()
    {
        $atraccionetes = TipusAtraccions::join('atraccions', 'atraccions.tipus_atraccio', '=', 'tipus_atraccions.id')
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

        $mytime = Carbon\Carbon::now();
        $temps = $mytime->toDateString();

        $atraccions = Atraccion::all();

        $pdf = PDF::loadView('/gestio/atraccions/pdfAtraccions', compact('atraccionetes'));

        return $pdf->download('atraccions'.$temps.'.pdf');
    }


    public function assigna()
    {
        $atraccionetes = TipusAtraccions::join('atraccions', 'atraccions.tipus_atraccio', '=', 'tipus_atraccions.id')
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

        return view('/gestio/atraccions/assigna', compact('atraccionetes'));
    }


    public function assignaEmpleat(Request $request) 
    {
        $request->validate([
            'data_inici' => ['required','date','before:data_fi'],
            'data_fi' => ['required','date','after:data_inici'],
            'id_rol' => ['required','integer']
        ]);

        $empleats = AssignacioAtraccion::AssignacioFiltre($request->data_inici,$request->data_inici,$request->id_rol);

        return response()->json(array('empleats' => $empleats), 200);
    }
    
    public function crearAssignacioManteniment(Request $request, $id)
    {
        $atraccio = Atraccion::find($id);
        $rols = Rol::where('id','!=',1)->where('id','!=',2)->orderBy('id','DESC')->get();

        return view('/gestio/atraccions/crearassignaciomanteniment', compact('atraccio','rols'));
    }

    public function assignaEmpleatNeteja(Request $request) 
    {
        $request->validate([
            'data_inici' => ['required','date','before:data_fi'],
            'data_fi' => ['required','date','after:data_inici']
        ]);

        $empleats = AssignacioAtraccion::AssignacioFiltre($request->get('data_inici'),$request->get('data_inici'),4);

        // dump($empleats);
        
        return response()->json(array('empleats' => $empleats), 200);
    }
    
    public function crearAssignacioNeteja(Request $request, $id)
    {
      $atraccio = Atraccion::find($id);
      
      return view('/gestio/atraccions/crearassignacioneteja', compact('atraccio'));
    }

    public function assignaEmpleatGeneral(Request $request) 
    {
        $request->validate([
            'data_inici' => ['required','date','before:data_fi'],
            'data_fi' => ['required','date','after:data_inici']
        ]);

        $empleats = AssignacioAtraccion::AssignacioFiltre($request->get('data_inici'),$request->get('data_inici'),5);

        return response()->json(array('empleats' => $empleats), 200);
    }

    public function crearAssignacioGeneral(Request $request, $id)
    {
      $atraccio = Atraccion::find($id);
      
      return view('/gestio/atraccions/crearassignaciogeneral', compact('atraccio'));
    }

    public function guardarAssignacio(Request $request, $id)
    {
        $atraccio = Atraccion::findOrFail($id);

        $assignacio = new AssignacioAtraccion([
            'id_empleat'=>$request->get('id_empleat'),
            'id_atraccio'=>$request->get('id_atraccio'),
            'data_inici'=> $request->get('data_inici_modal'),
            'data_fi'=>$request->get('data_fi_modal')
        ]);

        $assignacio->save();

        return redirect('/gestio/atraccions/assigna')->with('success', 'Empleat assignat correctament');
    }
    
    public function assignacions()
    {
        $assignacio = AssignacioAtraccion::leftJoin('users','users.id', 'assign_emp_atraccions.id_empleat')
            ->leftJoin('atraccions','atraccions.id', 'assign_emp_atraccions.id_atraccio')
            ->leftJoin('rols','rols.id', 'users.id')
            ->get([
                'assign_emp_atraccions.id as id',
                'assign_emp_atraccions.id_empleat as id_empleat',
                'assign_emp_atraccions.id_atraccio as id_atraccio',
                'assign_emp_atraccions.data_inici as data_inici',
                'assign_emp_atraccions.data_fi as data_fi',
                'users.nom as nom_empleat',
                'users.cognom1 as cognom_empleat',
                'atraccions.nom_atraccio as nom_atraccio',
                'rols.nom_rol as nom_rol'
            ]);

        return view('gestio/atraccions/assignacions', compact('assignacio'));
    }

    public function editAssignacions(Request $request, $id)
    {
        $assignacio = AssignacioAtraccion::findOrFail($id);

        $dades_user = User::findOrFail($assignacio->id_empleat);

        $dades_atraccio = Atraccion::findOrFail($assignacio->id_atraccio);

        return view('gestio/atraccions/editAssignacions', compact(['assignacio','dades_user','dades_atraccio']));
    }

    public function updateAssignacions(Request $request, $id)
    {
        $request->validate([
            'data_inici' => ['required','date','before:data_fi'],
            'data_fi' => ['required','date','after:data_inici']
        ]);
        
        $assignacio = AssignacioAtraccion::findOrFail($id);

        $assignacio->data_inici = $request->get('data_inici');
        $assignacio->data_fi = $request->get('data_fi');

        $assignacio->save();

        return redirect('/gestio/atraccions/assignacions')->with('success', 'Assignacio modificada correctament');
    }

    public function destroyAssignacions($id)
    {
        $assignacio = AssignacioAtraccion::find($id);

        $assignacio->delete();

        return redirect('/gestio/atraccions/assignacions')->with('success', 'Assignacio suprimida correctament');
    }


    public function guardarAssignacionsPDF()
    {
        $assignacio = AssignacioAtraccion::leftJoin('users','users.id', 'assign_emp_atraccions.id_empleat')
            ->leftJoin('atraccions','atraccions.id', 'assign_emp_atraccions.id_atraccio')
            ->leftJoin('rols','rols.id', 'users.id')
            ->get([
                'assign_emp_atraccions.id as id',
                'assign_emp_atraccions.id_empleat as id_empleat',
                'assign_emp_atraccions.id_atraccio as id_atraccio',
                'assign_emp_atraccions.data_inici as data_inici',
                'assign_emp_atraccions.data_fi as data_fi',
                'users.nom as nom_empleat',
                'users.cognom1 as cognom_empleat',
                'atraccions.nom_atraccio as nom_atraccio',
                'rols.nom_rol as nom_rol'
            ]);

        $mytime = Carbon\Carbon::now();
        $temps = $mytime->toDateString();

        $atraccions = AssignacioAtraccion::all();

        $pdf = PDF::loadView('/gestio/atraccions/pdfAssignacions', compact('assignacio'));

        return $pdf->download('assignacioAtraccions'.$temps.'.pdf');
    }

}
