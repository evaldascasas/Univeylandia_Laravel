<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atraccion extends Model
{

  protected $fillable = [
    'nom_atraccio',
    'tipus_atraccio',
    'data_inauguracio',
    'altura_min',
    'altura_max',
    'accessibilitat',
    'acces_express',
    'descripcio',
    'votacions',
    'path'
  ];
}
