<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Facades\Hash;
use Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ClientsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $randomPass = str_random(16);

        $user = new User([
            'nom' => $row['nom'],
            'cognom1' => $row['cognom1'],
            'cognom2' => $row['cognom2'],
            'email' => $row['email'],
            'email_verified_at' => Carbon\Carbon::now(),
            'password' => Hash::make($randomPass),
            'data_naixement' => $row['data_naixement'],
            'adreca' => $row['adreca'],
            'ciutat' => $row['ciutat'],
            'provincia' => $row['provincia'],
            'codi_postal' => $row['codi_postal'],
            'tipus_document' => $row['tipus_doc'],
            'numero_document' => $row['num_doc'],
            'sexe' => $row['sexe'],
            'telefon' => $row['telefon'],
            'id_rol' => 1,
        ]);

        $user->save();

        dispatch(new \App\Jobs\SendEmailOnUserCreationJob($user));

        return $user;
    }

}