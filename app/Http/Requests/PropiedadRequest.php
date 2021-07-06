<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            "name" => ["required", "max:30", Rule::unique('propiedades', 'name')->where('comunidad_id', $this->request->get('comunidad_id'))],
            "user_id" => ["required", "exists:users,id"],
            "comunidad_id" => ["exists:comunidades,id"],
            "tipoPropiedad_id" => ["required", "exists:tipos_propiedades,id"],
            "coeficiente" => ["required"],
            "parte" => ["required"],
            "observaciones" => ["max:100"]
        ];
    }

}
