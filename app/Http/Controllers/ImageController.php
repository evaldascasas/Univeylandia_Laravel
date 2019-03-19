<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\File;
use \App\Atraccion;
use \App\Imatge;
use \App\Tipus_producte;
use Input;
use \App\Producte;
use Image;

//use Illuminate\Http\Request;

class ImageController extends Controller
{

	public function create()
	{

		$atraccions=DB::table('atraccions')->get();
		return view ('gestio/imatges/create', compact("atraccions"));

	}

   	public function save(Request $request)
   	{
	   //validació
	   $validate = $this->validate($request,[
		   'description' => 'required',
		   'image_path' => 'required|image'
		]);

		//agafant les dades
		$image_path = $request->file('image_path');
		$description = $request->input('description');
		$id_atraccio = $request->get('atraccio');

		    $file = $request->file('image_path');

		    $file_name = time() . $file->getClientOriginalName();
		    $file_path = 'img';
		    $img = Image::make($file->getRealPath())->resize(800, 600)
		    ->save($file_path."/".$file_name);

		    //Marca D'aigua
		    $nom = $image_path->getClientOriginalName();
		    $tipus =  $image_path->getMimeType();

	    //IF per a png
	    if ($tipus == 'image/png') {

		    $im = imagecreatefrompng("../public/img/".$file_name);
		    $marcaAigua = imagecreatefrompng("../public/img/logo.png");
		    $margeDret = 10;
		    $margeInf = 10;
		    $sx = imagesx($marcaAigua);
		    $sy = imagesy($marcaAigua);

	        imagecopymerge($im, $marcaAigua ,400, 450, 0, 0, 410, 160, 30);
	        //header('Content-Type: image/png');
	        imagepng($im, "img/".$description."_marca.png");
	        imagedestroy($im);

	    //IF per a jpeg
	    }else if ($tipus == 'image/jpeg') {

	        $im = imagecreatefromjpeg("../public/img/".$file_name);
	        $marcaAigua = imagecreatefrompng("../public/img/logo.png");
	        $margeDret = 10;
	        $margeInf = 10;
	        $sx = imagesx($marcaAigua);
	        $sy = imagesy($marcaAigua);

	        imagecopymerge($im, $marcaAigua ,400, 450, 0, 0, 410, 160, 30);
	        imagepng($im, "img/".$description."_marca.png");
	        imagedestroy($im);

			//IF per a gif
	       }else if ($tipus == 'image/gif'){
	       	$im = imagecreatefromgif("../public/img/".$file_name);
	        $marcaAigua = imagecreatefromgif("../public/img/logo.png");
	        $margeDret = 10;
	        $margeInf = 10;
	        $sx = imagesx($marcaAigua);
	        $sy = imagesy($marcaAigua);

	        imagecopymerge($im, $marcaAigua ,400, 450, 0, 0, 410, 160, 30);
	        //header('Content-Type: image/png');
	        imagepng($im, "img/".$description."_marca.png");
	        imagedestroy($im);
	       }

	    $imageAigua="img/".$description."_marca.png";

	    $preu=5;
	    $mida= "800x600px";
	    $estat=1;

	    $imatge = new Imatge();
	    $imatge->foto_path=$image_path;
	    $imatge->foto_path_aigua=$imageAigua;
	    $imatge->nom=8;
	    $imatge->preu=$preu;
	    $imatge->mida=$mida;
	    $imatge->id_atraccio=$id_atraccio;
	    $imatge->save();

    	$atributs_producte = 	Imatge::latest()
     							->take(1)
     							->get();

	    $imatge_product = new Producte();
	    $imatge_product->descripcio=$description;
	    $imatge_product->atributs=$atributs_producte[0]->id;
	    $imatge_product->estat=$estat;

	    $imatge_product->save();

		$atraccions=DB::table('atraccions')->get();
	   	return view('gestio/imatges/create',compact("atraccions"));
	}
}
