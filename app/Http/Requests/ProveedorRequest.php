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
            'doi' => ['required', 'alpha_num', 'size:9', Rule::unique('proveedores')->ignore($this->route('proveedor'))],
            'persona' => ['enum:física,jurídica'],
            'nombre' => 'required|string|max:25',
            'apellidos' => 'string|max:40|nullable',
            'email' => ['required','email:rfc,filter',Rule::unique('proveedores')->ignore($this->route('proveedor'))],
            'telefono1' => 'required|string|max:14',
            'telefono2' => 'required|string|max:14',
            'dir_postal' => ['string', 'max:40'],
            'cp' => ['required', 'string', 'size:5'],
            'actividad' => 'exists:actividades,codigo',
            'pais' => 'exists:paises,id',
            'localidad' => 'required|string|max:35',
            'iban' => ['string', 'size:24'],
            'comentario' => ['nullable', 'string']
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
