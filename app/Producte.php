<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producte extends Model
{
     protected $table = 'productes';
     protected $fillable = [
    'atributs',
    'descripcio',
    'estat'
  ];
}
