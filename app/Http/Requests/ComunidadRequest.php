<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComunidadRequest extends FormRequest
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
             'cif' => ['required', 'alpha_num', 'size:9' ,'unique:comunidades,cif'],
            'fechalta' => 'required|date',
            'activa' => 'boolean',
            'gratuita' => 'boolean',
            'partes' => 'integer|nullable',
            'denom' => 'required|string|max:35',
            'direccion' => 'required|string',
            'localidad' => 'string|nullable',
            'provincia' => 'string|nullable',
            'cp' => 'required|size:5',
            'pais' => 'string|nullable',
            'logo' => 'nullable',
            'observaciones' => 'string||nullable',
            //
        ];
    }
}
