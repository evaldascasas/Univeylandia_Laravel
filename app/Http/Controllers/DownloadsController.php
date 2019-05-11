<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

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

        return view('gestio.downloads.index');
    }
}
