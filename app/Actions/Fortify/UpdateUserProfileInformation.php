<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'apellido1' => ['required', 'string', 'max:255'],
            'apellido2' => ['required', 'string', 'max:255'],
            // 'nif' => ['required', 'string', 'max:255'],
            'nif' => ['required', 'max:255', Rule::unique('users')->ignore($user->id)],
            'telefono' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'num_cta' => ['required', 'integer'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],

            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
    } else {
        $user->forceFill([
            'name' => $input['name'],
            'apellido1' => $input['apellido1'],
            'apellido2' => $input['apellido2'],
            'nif' => $input['nif'],
            'telefono' => $input['telefono'],
            'role' => $input['role'],
            'num_cta' => $input['num_cta'],

            'email' => $input['email'],
        ])->save();
    }
}

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'apellido1' => $input['apellido1'],
            'apellido2' => $input['apellido2'],
            'nif' => $input['nif'],
            'telefono' => $input['telefono'],
            'role' => $input['role'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
