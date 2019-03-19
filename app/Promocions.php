<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promocions extends Model
{
     protected $table = 'promocions';
     protected $fillable = [
    'titol',
    'descripcio',
    'id_usuari',
    'path_img'
  ];
}
