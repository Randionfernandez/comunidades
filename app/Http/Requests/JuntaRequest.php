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
            'denominacion' => 'required|string',
            'tipo' => 'required|in:ordinaria,extraordinaria',
            'user_id' => 'required|exists:users,id',
            'comunidad_id' => 'required|exists:comunidades,id',
            'fechaprimera' => 'required|date',
            'horaprimera' => 'required',
            'fechasegunda' => 'required|date',
            'horasegunda' => 'required',
            'ordendia' => 'required|string',
        ];
    }
}