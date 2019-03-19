<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipus_producte extends Model
{
     protected $table = 'tipus_producte';
     
     protected $fillable = [
       'nom'
      ];
}
