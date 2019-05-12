<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class DadesEmpleat extends Model
{
    //
    use SoftDeletes;

    protected $table = 'dades_empleats';

    protected $fillable = [
        'codi_seg_social',
        'num_nomina',
        'IBAN',
        'especialitat',
        'carrec',
        'data_inici_contracte',
        'data_fi_contracte',
        'id_horari'
    ];
}
