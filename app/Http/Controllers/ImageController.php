<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

use \App\Atraccion;
use \App\Imatge;
use \App\Tipus_producte;
use \App\Producte;

use Image;
use File;

//use Illuminate\Http\Request;

class ImageController extends Controller
{
	/**
     * Display a listing of the images.
     *
     * @return \Illuminate\Http\Response
     */
	public function index()
	{
		$images = Imatge::all();

		return view('gestio/imatges/index', compact('images'));
	}

	/**
     * Show the form for uploading a new set of images.
     *
     * @return \Illuminate\Http\Response
     */
	public function save()
	{
		$atraccions = Atraccion::all();

		return view('gestio/imatges/upload', compact('atraccions'));
	}

	/**
	 * 
	 */
   	public function upload(Request $request)
   	{
		$og_dir = 'storage/clients/originals/';
		$water_dir = 'storage/clients/';
		$thumb_dir = 'storage/clients/thumb/';
		$watermark = '../public/img/watermark.png';

		$preu = Tipus_producte::where('id',8)
		->first();

		$today = Carbon::today()->format('Y-m-d');

		$request->validate([
			'image' => 'required',
			'image.*' => 'image|mimes:jpeg,png,jpg|max:2048',
			'attraction' => 'required|numeric'
		]);

		// comprovar si hi ha imatges en el form
		if($request->hasFile('image')) {

            // crear directori si no existeix
            if( ! File::exists($og_dir)) {
                 File::makeDirectory($og_dir, 0777, true);
            }
            if ( ! File::exists($water_dir)) {
                 File::makeDirectory($water_dir, 0777, true);
			}
			if ( ! File::exists($thumb_dir)) {
				File::makeDirectory($thumb_dir, 0777, true);
		   }

			$images = $request->file('image');

			foreach($images as $image) {
				$rnd = rand(11111111,99999999);

				$og_image = Image::make($image);

				$og_image->resize(null, 1080, function ($constraint) {
					$constraint->aspectRatio();
					// $constraint->upsize();
				})->encode('png', 100);

				$og_image->save($og_dir.$rnd.$today.'.png');

				$water_img = $og_image->insert($watermark,'center');

				$water_img->save($water_dir.$rnd.$today.'.png');

				$thumbnail = $water_img->resize(100, 100, function ($constraint) {
					$constraint->aspectRatio();
					$constraint->upsize();
				})->encode('png', 65);

				$thumbnail->save($thumb_dir.$rnd.$today.'.png');

				$guardar_imatge = new Imatge([
					'nom' => 8,
					'mida' => '1080 pixels',
					'foto_path' => $og_dir.$og_image->basename,
					'foto_path_aigua' => $water_dir.$water_img->basename,
					'thumbnail' => $thumb_dir.$thumbnail->basename,
					'preu' => $preu->preu_base,
					'id_atraccio' => $request->get('attraction'),
				]);

				$guardar_imatge->save();
			}
			
		}

	   	return redirect('gestio/imatges')->with('success','Imatges pujades correctament!');
	}
}
