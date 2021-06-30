<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropietarioRequest extends FormRequest
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
        "Nombre" => ["required", "max:30"],
        "Apellido1" => ["required", "max:30"],
        "Apellido2" => ["required", "max:30"],
        "DNI" => ["required", "max:9"],
        "Email" => ["required", "max:30"],
        "Telefono" => ["required", "max:9"],
        "Calle" => ["required", "max:30"],
        "Portal" => ["required", "max:4"],
        "Bloque" => ["required", "max:4"],
        "Escalera" => ["required", "max:4"],
        "Piso" => ["required", "max:4"],
        "Puerta" => ["required", "max:4"],
        "Codigo_pais" => ["required", "max:2"],
        "CP" => ["required", "max:5"],
        "Pais" => ["required", "max:20"],
        "Provincia" => ["required", "max:20"],
        "Localidad" => ["required", "max:20"],
        ];
    }
}

