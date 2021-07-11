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
            "denominacion" => ["required", "max:30", Rule::unique('propiedades')->where('comunidad_id', Session()->get('activeCommunity')->id)->ignore($this->route('propiedad'))],
            "user_id" => ["required", "exists:users,id"],
            "comunidad_id" => ["exists:comunidades,id"],
            "tipo_id" => ["required", "exists:tipo_propiedad,id"],
            "coeficiente" => ["required"],
            "parte" => ["required", Rule::unique('propiedades')->where('comunidad_id', Session()->get('activeCommunity')->id)->ignore($this->route('propiedad'))],
            "observaciones" => ["max:100"]
        ];
    }

}
