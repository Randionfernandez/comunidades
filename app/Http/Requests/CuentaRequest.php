<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CuentaRequest extends FormRequest
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
            'iban' => ['boolean', 'size:25', 'required', 'unique:cuentas,iban'],
            'siglas' => ['string', 'size:4'],
            'denominacion' => ['string', 'max:35', 'alpha_num'],
            'fecha_apertura' => 'required|date',
            'activa' => 'boolean',
            'saldo' => 'digits_between:0,10',
            'bic' => 'string',
            'divisa' => 'string|size:5',
            'comentarios' => 'string'
        ];
    }

    public function messages()
    {
        return[
        ];
    }
}
