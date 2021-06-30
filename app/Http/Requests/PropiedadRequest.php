<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            "nombre" => ["required", "max:30"],
            "propietario" => ["required", "max:30"],
            "comunidad_id" => ["required", "exists:comunidades,id"],
            "tipo" => ["required", "in:local, piso, atico"],
            "coeficiente" => ["required"],
            "parte" => ["required"],
            "observacion" => ["max:100"]
        ];
    }

}
