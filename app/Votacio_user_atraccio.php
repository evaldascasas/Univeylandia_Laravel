<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Votacio_user_atraccio extends Model
{
     protected $table = 'votacio_user_atraccio';
     protected $fillable = [
    'id_usuari',
    'id_atraccio',
    'created_at'
  ];
}
