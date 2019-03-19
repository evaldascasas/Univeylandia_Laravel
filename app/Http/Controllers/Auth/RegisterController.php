<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'surname1' => ['required', 'string', 'max:255'],
            'surname1' => ['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'birth-date' => ['required', 'date'],
            'address' => ['required', 'string'],
            'city' => ['required', 'string'],
            'province' => ['required', 'string'],
            'postal-code' => ['required', 'string'],
            'document-type' => ['required'],
            'document-number' => ['required'],
            'gender' => ['required'],
            'telephone-number' => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'nom' => $data['name'],
            'cognom1' => $data['surname1'],
            'cognom2' => $data['surname2'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'data_naixement' => $data['birth-date'],
            'adreca' => $data['address'],
            'ciutat' => $data['city'],
            'provincia' => $data['province'],
            'codi_postal' => $data['postal-code'],
            'tipus_document' => $data['document-type'],
            'numero_document' => $data['document-number'],
            'sexe' => $data['gender'],
            'telefon' => $data['telephone-number'],
            'id_rol' => 1,
            'id_dades_empleat' => null,
            'actiu' => 0,
        ]);
    }
}
