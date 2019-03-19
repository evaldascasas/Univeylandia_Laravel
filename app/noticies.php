<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class noticies extends Model
{
     protected $table = 'noticies';
     protected $fillable = [
    'titol',
    'descripcio',
    'id_usuari',
    'categoria',
    'path_img'
  ];
}
