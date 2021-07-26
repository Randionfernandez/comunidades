<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovimientoRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'n_op' => 'required|integer|min:1',
            'fecha' => 'required|date',
            'fechavalor' => 'required|date|gte:fecha',
            'importe' => 'required|numeric|digits_between:0,10',
            'saldo' => 'required|numeric|digits_between:0,10',
            'concepto' => 'string|max:70',
            'contabilizado' => 'boolean|nullable',
            'user_id' => 'exits:users,id',
            'cuenta_id' => 'exits:cuentas,id'
        ];
    }

}
