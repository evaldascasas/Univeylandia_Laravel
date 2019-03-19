<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    protected $table = 'incidencies';

    protected $fillable = [
        'titol',
        'descripcio',
        'id_prioritat',
        'id_estat',
        'id_usuari_reportador',
        'id_usuari_assignat'
    ];

}
