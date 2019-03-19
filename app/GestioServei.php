<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GestioServei extends Model
{
  protected $table = 'serveis';

  protected $fillable = [
      'nom'
  ];


}
