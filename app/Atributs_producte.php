<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atributs_producte extends Model
{
     protected $table = 'atributs_producte';
     protected $fillable = [
    'nom',
    'mida',
    'tickets_viatges',
    'preu',
    'foto_path',
    'foto_path_aigua'
  ];
}
