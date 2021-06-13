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
        'name' => ['required', 'string', 'max:30'],
        'apellido1' => ['required', 'string', 'max:30'],
        'apellido2' => ['required', 'string', 'max:30'],
        'nif' => ['required', 'string',  'max:9', 'unique:users'],
        'telefono' => ['required', 'string', 'max:9'],
        'role' => ['required', 'string',  'max:9'],
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
        'calle' => $input['calle'],
        'portal' => $input['portal'],
        'bloque' => $input['bloque'],
        'escalera' => $input['escalera'],
        'piso' => $input['piso'],
        'puerta' => $input['puerta'],
        'cod_pais' => $input['cod_pais'],
        'cp'=>$input['cp'],
        'pais'=>$input['pais'],
        'provincia'=>$input['provincia'],
        'localidad'=>$input['localidad'],
        'role' => $input['role'],
        'num_cta' => $input['num_cta'],
        'email' => $input['email'],
        'password' => Hash::make($input['password']),
      ]);
    }
  }
