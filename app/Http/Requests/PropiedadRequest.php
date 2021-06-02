<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use App\Models\comunidad;
use App\Http\Requests\PropiedadRequest;



class PropiedadRequest extends FormRequest
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
           'comunidades_id' => 'required|integer',
           'users_id' => 'required|integer',
           'ref_ca' => 'required|string|max:255',
           'parte' => 'integer',
           'coeficiente' => 'integer',
           'observaciones'=>'string|nullable'

       ];
   }
   public function messages() {
    return [
        'ref_ca.required' => 'Debes introducir la referencia catastral',
        'users_id.required' => 'Debes introducir el id del usuario',
        'comunidades_id.required' => 'Debes introducir el id de la comunidad',


    ];
}

public function attributes(): array {
    return ['ref_ca' => "referencia catastral"];
}
}
