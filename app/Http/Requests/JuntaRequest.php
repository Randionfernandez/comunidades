<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JuntaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'denom_convocatoria' => 'string',
            'tipo' => '',
            'user_id' => 'exists:users,id',
            'comunidad_id' => 'exists:comunidades,id',
            'fecha_primera' => 'required|date',
            'hora_primera' => 'required',
            'fecha_segunda' => 'required|date',
            'hora_segunda' => 'required',
            'orden_dia' => 'string',
        ];
    }
}