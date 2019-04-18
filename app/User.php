<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;

// use Illuminate\Auth\Notifications\ResetPassword;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use SoftDeletes;

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
        'email_verified_at',
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
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    // /**
    //  * Send the password reset notification.
    //  *
    //  * @param  string  $token
    //  * @return void
    //  */
    // public function sendPasswordResetNotification($token)
    // {
    //     $this->notify(new ResetPassword($token));
    // }

}
