<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;

class FormularioController extends Controller
{
    public function datos(Request $request)
    {
        $validatedData = $request->validate([
            'tipo_documento' => 'required|string',
            'numero_documento' => 'required|numeric',
            'nombres_apellidos' => 'required|string',
            'telefono' => 'required|string',
            'fecha_atencion' => 'required|date',
            'municipio_atencion' => 'required|string',
            'modalidad_atencion' => 'required|string',
            'tiene_alguna_discapacidad' => 'required|string',
            'tipo_discapacidad' => 'nullable|string',
            'servicio_atendido' => 'required|string',
        ]);

        $encuesta = new Registro($validatedData); 
        
        $encuesta->save();

        return redirect()->route('registro.completado')->with('success', 'Encuesta llenada!!');
    }
}
