<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str as Str;
use Illuminate\Http\UploadedFile;
use Storage;
use File;
use Auth;
use View;


use \App\Promocions;

class PromocionsController extends Controller
{
     /**
      * Consulta a la base de dades les promocions
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
      * Retorna la vista create
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
          return view('gestio/promocions/create');
     }

     /**
      * Guarda les noves promocions inserides per l'usuari a la base de dades
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request)
     {
          if ($request->has('image')) {
               request()->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
               ]);

               $file = $request->file('image');

               $file_name = time() . $file->getClientOriginalName();

               $file_path = 'storage/promocions';

               $file->move($file_path, $file_name);

               $foto_up = "/" . $file_path . "/" . $file_name;
          } else {
               $foto_up = "";
          }

          $promocio = new Promocions([
               'titol' => $request->get('titol'),
               'descripcio' => $request->get('descripcio'),
               'id_usuari' => Auth::id(),
               'path_img' => $foto_up,
               'slug' => Str::slug($request->get('titol'))
          ]);

          $promocio->save();

          return redirect('/gestio/promocions')->with('success', 'Promoció registrada correctament');
     }

     /**
      * Rep un id i busca  a la taula promocions la promocio seleccionada i la retorna a la vista
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($id)
     {
          $promocio = promocions::findOrFail($id);

          return View::make('gestio.promocions.show')->with('promocio', $promocio);
     }

     /**
      * Rep un id la busca a la base de dades i retorna la consulta a la vista
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit($id)
     {
          $promocio = promocions::findOrFail($id);

          return view('gestio/promocions/edit', compact('promocio'));
     }

     /**
      * Rep un id el selecciona a la taula promocions de la base de dades i el modifica amb el request
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, $id)
     {
          $promocio = Promocions::findOrFail($id);

          $promocio->titol = $request->get('titol');
          $promocio->descripcio = $request->get('descripcio');
          $promocio->slug = $request->get('titol');

          if ($request->has('image')) {
               $image_path = public_path() . $promocio->path_img;

               if (File::exists($image_path)) {
                    File::delete($image_path);
               }
               request()->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
               ]);

               $file = $request->file('image');
               $file_name = time() . $file->getClientOriginalName();
               $file_path = 'storage/promocions';
               $file->move($file_path, $file_name);

               $promocio->path_img = "/" . $file_path . "/" . $file_name;
          }

          $promocio->save();

          return redirect('/gestio/promocions')->with('success', 'Promoció modificada correctament');
     }

     /**
      * Elimina la promocio seleccionada
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
          $promocio = Promocions::findOrFail($id);

          $promocio->delete();

          return redirect('/gestio/promocions')->with('success', 'Promoció eliminada correctament');
     }
}
