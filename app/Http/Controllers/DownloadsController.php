<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use File;

class DownloadsController extends Controller
{
    //
    public function index()
    {
        // $files = Storage::files('public/software');

        // dd($files);

        // Storage::makeDirectory('public/asd');

        // sleep(5);

        // Storage::deleteDirectory('public/asd');

        // $file = storage_path('installed');

        // $wat = File::exists($file);

        // dd($wat);

        return view('gestio.downloads.index');
    }
}
