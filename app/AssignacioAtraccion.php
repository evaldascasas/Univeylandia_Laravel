<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class AssignacioAtraccion extends Model
{
    protected $table = "assign_emp_atraccions";

    protected $fillable = [
        'id_empleat',
        'id_atraccio',
        'data_inici',
        'data_fi'
    ];


    public static function AssignacioFiltre($data_inici, $data_fi, $id_rol)
    {
        $empleats = DB::select(
            "SELECT * FROM users WHERE users.id_rol = $id_rol AND users.id NOT IN (
          SELECT
             assign_emp_atraccions.id_empleat
          FROM
             assign_emp_atraccions
          WHERE
             ('$data_inici' BETWEEN assign_emp_atraccions.data_inici AND date_sub(assign_emp_atraccions.data_fi, INTERVAL +1 day))
             OR
             ('$data_fi' BETWEEN date_sub(assign_emp_atraccions.data_inici, INTERVAL -1 day) AND assign_emp_atraccions.data_fi)
             OR
             ( assign_emp_atraccions.data_inici <= '$data_inici' AND assign_emp_atraccions.data_fi >= '$data_fi')
             OR
             ( assign_emp_atraccions.data_inici >= '$data_inici' AND assign_emp_atraccions.data_fi <= '$data_fi')
           )"
        );

        return $empleats;
    }

    public static function assignarMantenimentFiltro()
    {
        $user = DB::select('SELECT
    *
    FROM
       users
    WHERE
        users.id_rol = "3"
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

    public static function assignarNetejaFiltro()
    {
        $user = DB::select('SELECT
    *
    FROM
       users
    WHERE
        users.id_rol = "4"
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

    public static function assignarGeneralFiltro()
    {
        $user = DB::select('SELECT
    *
    FROM
       users
    WHERE
        users.id_rol = "5"
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
