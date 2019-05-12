<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Contacte extends Model
{
    protected $table = 'contacte';

    protected $fillable = [
        'nom',
        'email',
        'tipus_pregunta',
        'missatge',
        'id_estat',
        'id_tiquet'
    ];


    public static function empleatLliure($id)
    {
        $user = DB::select('SELECT
      *
      FROM
         users
      WHERE
          users.id_rol = "6"
          AND
         users.id NOT IN
         (
            SELECT
               assign_emp_atraccions.id_empleat
            FROM
               assign_emp_atraccions
            WHERE
               ( assign_emp_atraccions.data_inici <= "$data_inici_global" AND assign_emp_atraccions.data_fi >= "$data_fi_global")
               OR
               ( assign_emp_atraccions.data_inici >= "$data_inici_global" AND assign_emp_atraccions.data_fi <= "$data_fi_global")
             )');
        return $user;
    }
}
