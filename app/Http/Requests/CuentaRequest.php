<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'iban' => ['size:24', 'required', Rule::unique('cuentas')->ignore($this->cuenta, 'id')],
            'siglas' => ['string', 'size:4'],
            'denominacion' => ['string', 'max:35'],
            'fecha_apertura' => 'required|date',
            'activa' => 'boolean',
            //'saldo' => 'numeric|digits_between:0.00,10.00',
            'saldo' => 'numeric' ,
            'bic' => 'string',
            'divisa' => 'string|max:5',
            'comentarios' => 'string',
            'comunidad_id' => 'exists:comunidades,id'
        ];
    }

    public function messages()
    {
        return[
        ];
    }
}
