<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'tipo_documento'            => 'required|string',
            'numero_documento'          => 'required|numeric',
            'nombres_apellidos'         => 'required|string',
            'telefono'                  => 'required|numeric',
            'direccion'                 => 'required|string|max:255',
            'genero'                    => 'required|string|max:255',
            'fecha_atencion'            => 'required|date',
            'municipio_atencion'        => 'required|string',
            'modalidad_atencion'        => 'required|string',
            'tiene_alguna_discapacidad' => 'required|string',
            'tipo_discapacidad'         => 'nullable|string',
            'servicio_atendido'         => 'required|string',
            'trato_personal'            => 'required|string|max:255',
            'tiempo_espera'             => 'required|string|max:255',
            'privacidad_info'           => 'required|string|max:255',
            'experiencia_salud'         => 'required|string|max:255',
            'resultados_atencion'       => 'required|string|max:255',
            'recomendacion'             => 'required|string|max:255',
            'comentarios'               => 'nullable|string|max:255',
            'firma_digital'             => 'nullable|string',
            'firma'                     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'otro'                      => 'nullable|string',
        ];
    }

    public function messages()
    {
        return
        [
            'firma.required' => 'La imagen es obligatoria.',
            'firma.image' => 'El archivo debe ser imagen.',
            'firma.mimes' => 'Solo se permiten imagenes en formato jpeg,png,jpg o gif.',
            'firma.max' => 'La imagen no deber ser mayor a 2 megabytes.',
        ];
    }
}



