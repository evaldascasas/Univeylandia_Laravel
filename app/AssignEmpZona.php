<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignEmpZona extends Model
{
  protected $table = 'empleat_zona';

  protected $fillable = [
      'id_zona',
      'id_empleat',
      'data_inici',
      'data_fi'
  ];

}
