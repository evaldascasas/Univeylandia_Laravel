<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Linia_cistella extends Model
{
    //
    protected $table = 'linia_cistelles';

    protected $fillable = [
       'id_cistella',
       'producte',
       'quantitat'
    ];
}
