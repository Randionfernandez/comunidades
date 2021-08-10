<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class PropiedadRequest extends FormRequest {

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
            "comunidad_id" => ["exists:comunidades,id"],
            "user_id" => ["required", "exists:users,id"],
            "denominacion" => ["required", "max:10", Rule::unique('propiedades')->where('comunidad_id', Session()->get('cmd_seleccionada')->id)->ignore($this->route('propiedad'))],
            "parte" => ["required", Rule::unique('propiedades')->where('comunidad_id', Session()->get('cmd_seleccionada')->id)->ignore($this->route('propiedad'))],
            "coeficiente" => ["required", "numeric"],
            "domiciliada" => 'boolean|nullable',
            'iban' => ["string", "max:24"],
            "tipo" => ["required", "exists:tipos_propiedad,codigo"],
            "observaciones" => ["max:100"]
        ];
    }

}
