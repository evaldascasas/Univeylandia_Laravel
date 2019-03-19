<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Storage;
use File;
use Auth;
use View;


use \App\Promocions;

class PromocionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $promocions = DB::table('promocions')
        ->join('users', 'users.id', '=', 'promocions.id_usuari')
        ->select('promocions.id', 'titol', 'descripcio', 'users.nom', 'users.cognom1', 'users.cognom2', 'users.numero_document', 'path_img')
        ->orderBy('id', 'DESC')
        ->paginate(10);
      return view('gestio.promocions.index', compact('promocions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gestio/promocions/create');
    }

    /**
     * Store a newly created resource in storage.-
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
      if ($request->has('image')) {
        request()->validate([

              'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

          ]);
        $file = $request->file('image');
        $file_name = time() . $file->getClientOriginalName();
        $file_path = 'storage/promocions';
        $file->move($file_path, $file_name);
        $foto_up = "/".$file_path."/".$file_name;
      }else {
        $foto_up = "";
      }
      $promocio = new Promocions([
          'titol' => $request->get('titol'),
          'descripcio' => $request->get('descripcio'),
          'id_usuari' => Auth::id(),
          'path_img' => $foto_up
      ]);
      $promocio ->save();
      return redirect('/gestio/promocions')->with('success', 'Promoció registrada correctament');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $promocio = promocions::find($id);
        return View::make('gestio.promocions.show')
            ->with('promocio', $promocio);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $promocio = promocions::find($id);
        return view('gestio/promocions/edit', compact('promocio'));

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
      $promocio = Promocions::find($id);
      $promocio->titol = $request->get('titol');
      $promocio->descripcio = $request->get('descripcio');
      if ($request->has('image')) {
        $image_path = public_path().$promocio->path_img;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        request()->validate([

              'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

          ]);
        $file = $request->file('image');
        $file_name = time() . $file->getClientOriginalName();
        $file_path = 'storage/promocions';
        $file->move($file_path, $file_name);

        $promocio->path_img = "/".$file_path."/".$file_name;
      }
        $promocio->save();
        return redirect('/gestio/promocions')->with('success', 'Promoció modificada correctament');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $promocio = Promocions::find($id);
      $promocio->delete();
      return redirect('/gestio/promocions') ->with('success', 'Promoció eliminada correctament');
    }
}
