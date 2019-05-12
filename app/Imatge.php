<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imatge extends Model
{
	protected $table = 'atributs_producte';

	protected $fillable = [
		'nom', 'mida', 'foto_path', 'foto_path_aigua', 'thumbnail', 'preu', 'id_atraccio'
	];
}
