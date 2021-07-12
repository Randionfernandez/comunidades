<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovimientoRequest extends FormRequest
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
            'n_op' => 'required',
            'fecha' => 'required|date',
            'fecha valor' => 'required|date',
            'importe' => 'required|numeric',
            'saldo' => 'required|numeric',
            'concepto' => 'string',
            'comunidad_id' => 'exists:comunidades,id',
            'propiedad' => 'exists:propiedades,id'
        ];
    }
}
