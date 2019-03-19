<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cistella extends Model
{
    //
    protected $table = 'cistelles';

    protected $fillable = [
       'id_usuari'
    ];
}
