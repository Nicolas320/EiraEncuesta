<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;

class FormularioController extends Controller
{
    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'tipo_documento' => 'required|string',
            'numero_documento' => 'required|string',
            'nombres_apellidos' => 'required|string',
            'telefono' => 'required|string',
            'fecha_atencion' => 'required|date',
            'municipio_atencion' => 'required|string',
            'modalidad_atencion' => 'required|string',
            'tiene_alguna_discapacidad' => 'required|string',
            'tipo_discapacidad' => 'nullable|string',
            'servicio_atendido' => 'required|string',
        ]);

        // Crear un nuevo registro
        $registro = new Registro([
            'tipo_documento' => $request->get('tipo_documento'),
            'numero_documento' => $request->get('numero_documento'),
            'nombres_apellidos' => $request->get('nombres_apellidos'),
            'telefono' => $request->get('telefono'),
            'fecha_atencion' => $request->get('fecha_atencion'),
            'municipio_atencion' => $request->get('municipio_atencion'),
            'modalidad_atencion' => $request->get('modalidad_atencion'),
            'tiene_alguna_discapacidad' => $request->get('tiene_alguna_discapacidad'),
            'tipo_discapacidad' => $request->get('tipo_discapacidad', ''),
            'servicio_atendido' => $request->get('servicio_atendido'),
        ]);

        $registro->save();

        return redirect()->route('index.Finformulario')->with('success', 'Registro guardado exitosamente.');
    }


}
