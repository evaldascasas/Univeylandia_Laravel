<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GrafiquesController extends Controller
{
    public function graficaregistres()
    {
      return view('gestio.grafiques.graficaregistres');

    }

}
