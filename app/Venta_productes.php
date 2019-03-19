<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta_productes extends Model
{
     protected $table = 'venta_productes';
     protected $fillable = [
    'id_usuari',
    'preu_total',
    'estat'
  ];
}
