<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class AssignEmpZona extends Model
{
    protected $table = 'serveis_zones';

    protected $fillable = [
        'id_zona',
        'id_empleat',
        'data_inici',
        'data_fi'
    ];

    public static function assignarFiltro($data_inici, $data_fi, $id_serveis)
    {

        $user = DB::select("SELECT
    *
    FROM
       users
    WHERE
        users.id_rol = $id_serveis
        AND
       users.id NOT IN
       (
          SELECT
            serveis_zones.id_empleat
          FROM
              serveis_zones
              WHERE
             ( serveis_zones.data_inici <= '$data_inici' AND serveis_zones.data_fi >= '$data_fi')
             OR
             ( serveis_zones.data_inici >= '$data_inici' AND serveis_zones.data_fi <= '$data_fi')
           )");

        return $user;
    }

    public static function llistarEmpassign()
    {
        $Assignacions = DB::select('SELECT 
          serveis_zones.id, zones.nom as nom_zona, users.nom, users.cognom1, serveis_zones.data_inici, serveis_zones.data_fi 
          FROM zones, users, serveis_zones 
          WHERE serveis_zones.id_empleat = users.id 
          AND serveis_zones.id_zona = zones.id');

        return $Assignacions;
    }
}
