<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_entra_atraccio extends Model
{
     protected $table = 'user_entra_atraccio';
     protected $fillable = [
    'id_usuari',
    'id_atraccio',
    'id_ticket'
  ];
}
