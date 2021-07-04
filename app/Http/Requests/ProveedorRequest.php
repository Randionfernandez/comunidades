<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProveedorRequest extends FormRequest {

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
            'fechalta' => 'required|date',
            'cif' => ['required', 'alpha_num', 'size:9', Rule::unique('proveedores')->ignore($this->route('proveedor'))],
            'nombre' => 'required|string|max:35',
            'apellido1' => 'string|nullable',
            'apellido2' => 'string|nullable',
            'email' => ['required','email:rfc,filter',Rule::unique('proveedores')->ignore($this->route('proveedor'))],
            'telefono' => 'required|string|max:12',
            'tipoGasto' => ['required', 'exists:tipos_gastos,id'],
            'calificacion' => 'required|exists:calificaciones,id',
            'figura' => 'required|exists:figuras,id',
            'calle' => 'required|string|nullable',
            'portal' => 'integer|nullable',
            'bloque' => 'string|nullable',
            'escalera' => 'string|nullable',
            'piso' => 'integer|nullable',
            'puerta' => 'integer|nullable',
            'codigopais' => 'string|max:3|exists:paises,codigoANSIPais',
            'cp' => 'required|string|size:5',
            'pais' => 'exists:paises,id',
            'provincia' => 'required|string',
            'localidad' => 'required|string',
            'iban' => 'required|string|max:34'
        ];
    }

    public function messages() {

        return [
            'nombre.required' => __('Escriba su denominación social o nombre'),
            'cif.required' => __('Escriba su documento de identificación o pasaporte'),
            'email.required' => __('Escriba su email'),
            'codigopais.required' => __('Indique un código de país válido'),
            'cp.required' => __('Se necesita el código postal'),
            'pais.required' => __('Se necesita indicar el país'),
            'provincia.required' => __('Se necesita indicar una provincia'),
            'localidad.required' => __('Escriba su localidad'),
            'iban.required' => __('Escriba su IBAN')
        ];
    }

}
