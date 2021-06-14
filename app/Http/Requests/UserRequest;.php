<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest; extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
         'name' => ['required','max:30'],
         'apellido1' => ['required','max:30'],
         'apellido2' => ['required','max:30'],
         'nif' => ['required','max:9'],
         'telefono' => ['required','max:9'],
         'calle' => ['required','max:30'],
         'portal' => ['required','max:4'],
         'bloque' => ['required','max:4'],
         'escalera' => ['required','max:4'],
         'piso' => ['required|size:4'],
         'puerta' => ['required|size:4'],
         'cod_pais' => ['required','max:2'],
         'cp' => ['required|size:5'],
         'pais' => ['required','max:20'],
         'provincia' => ['required','max:20'],
         'localidad' => ['required','max:20'],
         'role' => ['required','max:9'],
         'num_cta' => ['required|size:30'],
         'email' => ['required','max:30'],
         'password' => ['required','max:9'],

     ];
 }
}
