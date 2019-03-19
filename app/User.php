<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 
        'cognom1', 
        'cognom2', 
        'email', 
        'password', 
        'data_naixement', 
        'adreca', 
        'ciutat', 
        'provincia', 
        'codi_postal', 
        'tipus_document', 
        'numero_document', 
        'sexe', 
        'telefon', 
        'id_rol',
        'id_dades_empleat',
        'actiu'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}
