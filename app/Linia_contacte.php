<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Linia_contacte extends Model
{
    protected $table = 'linia_contacte';

    protected $fillable = [
        'id_ticket_contacte',
        'id_empleat',
    ];
}
