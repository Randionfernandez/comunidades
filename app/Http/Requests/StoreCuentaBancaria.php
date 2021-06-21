<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCuentaBancaria extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required | string',
            'pais' => 'required | alpha | min:3 |max:3',
            'dc' => 'required | numeric | digits:2 ',
            'cuenta' => 'required | min:24',
            'bic' => 'required | regex:([A-Z]+)'
        ];
    }

    public function messages()
    {
        return[
            'bic.regex' => 'Debe de ser en mayusculas'
        ];
    }
}
