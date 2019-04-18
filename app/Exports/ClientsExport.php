<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClientsExport implements FromCollection, WithHeadings
{

    public function headings(): array
    {
        return [
            'Nom',
            'Cognom1',
            'Cognom2',
            'Email',
            'Data naixement',
            'Adreca',
            'Ciutat',
            'Provincia',
            'Codi postal',
            'Tipus doc',
            'Num doc',
            'Sexe',
            'Telefon'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::whereNotNull('email_verified_at')
        ->where('id_rol',1)
        ->get([
            'nom',
            'cognom1',
            'cognom2',
            'email',
            'data_naixement',
            'adreca',
            'ciutat',
            'provincia',
            'codi_postal',
            'tipus_document',
            'numero_document',
            'sexe',
            'telefon'
        ]);
    }
}
