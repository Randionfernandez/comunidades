<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ComunidadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return TRUE;
        // podemos acceder al usuario con $this->user()
        // podemos verificar que es administrador con
        // $this->user()->isAdmin()
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cif' => ['required', 'alpha_num', 'size:9', Rule::unique('comunidades')->ignore($this->route('comunidad'))],
            'fechalta' => 'required|date',
            'activa' => 'boolean',
            'gratuita' => 'boolean',
            'partes' => 'integer|nullable',
            'denom' => 'required|string|max:30',
            'direccion' => 'required|string|max:60',
            'localidad' => 'string|nullable|exists:comunidades_autonomas,id',
            'provincia' => 'exists:provincias,id|nullable',
            'cp' => 'required|size:5',
            'pais' => 'exists:paises,id',
            'logo' => 'nullable',
            'observaciones' => 'string|nullable',
            'MaxFreeCommunities' => 'integer'
    ];
    }
    
    public function messages() {
        return [
            'denom.required' => __('The community needs a name'),
            'cif.required' => __('The community needs an unique cif')
        ];
    }
}