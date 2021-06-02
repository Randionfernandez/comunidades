<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Fortify;
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
            'nif' => ['required', 'string',  'max:255', 'unique:users'],
            'telefono' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string',  'max:255'],
            'num_cta' => ['required', 'integer'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'apellido1' => $input['apellido1'],
            'apellido2' => $input['apellido2'],
            'nif' => $input['nif'],
            'telefono' => $input['telefono'],
            'role' => $input['role'],
            'num_cta' => $input['num_cta'],

            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
