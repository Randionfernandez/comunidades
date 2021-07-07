<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DistribucionGastoRequest extends FormRequest
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
            'orden' => 'required | numeric',
            'abreviatura' => 'required | alpha | max:3',
            'name' => 'required | alpha',
            'checkbox' => 'required',
            //'propietario' => 'required',
            'propiedad' => 'required',
            'coeficiente' => 'required',
            //'unidadRegistral' => 'required'

        ];
    }

    public function messages(){
        return [
            'checkbox.required' => 'Debes selecionar una propiedad'
        ];
    }
}
