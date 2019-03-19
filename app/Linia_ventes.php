<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Linia_ventes extends Model
{
     protected $table = 'linia_ventes';
     protected $fillable = [
    'id_venta',
    'producte',
    'quantitat'
  ];
}
