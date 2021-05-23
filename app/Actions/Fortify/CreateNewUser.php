<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
              'apellido1' => ['required', 'string', 'max:255'],
              'apellido2' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
              'tipo' => ['required', 'string', 'max:255'],
              'fecha' => ['required', 'string', 'max:255'],
              'nif' => ['required', 'string', 'max:255'],
              'telefono' => ['required', 'string', 'max:255'],
              'calle' => ['required', 'string', 'max:255'],
              'portal' => ['required', 'string', 'max:255'],
              'bloque' => ['required', 'string', 'max:255'],
              'escalera' => ['required', 'string', 'max:255'],
              'piso' => ['required', 'string', 'max:255'],
              'puerta' => ['required', 'string', 'max:255'],
              'codigo_pais' => ['required', 'string', 'max:255'],
              'cp' => ['required', 'string', 'max:255'],
              'pais' => ['required', 'string', 'max:255'],
              'provincia' => ['required', 'string', 'max:255'],
              'localidad' => ['required', 'string', 'max:255'],

            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'apellido1' => $input['apellido1'],
            'apellido2' => $input['apellido2'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'telefono' => $input['telefono'],
            'calle' => $input['calle'],
            'portal' => $input['portal'],
            'bloque' => $input['bloque'],
            'escalera' => $input['escalera'],
            'piso' => $input['piso'],
            'puerta' => $input['puerta'],
            'codigo_pais' => $input['codigo_pais'],
            'cp' => $input['cp'],
            'pais' => $input['pais'],
            'provincia' => $input['provincia'],
            'localidad' => $input['localidad'],


        ]);
    }
}
