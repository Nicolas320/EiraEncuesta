<?php

namespace App\Http\Controllers;

use App\Models\AtencionIndividual;
use Illuminate\Http\Request;
use App\Models\Registro;

class FormularioController extends Controller
{
    public function datos(Request $request)
    {
        // dd($request);
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

            // /*ATENCIÓN INDIVIDUAL y ASPECTOS GENERALES */ 
            // 'trato_personal' => 'required|string|max:255',
            // 'tiempo_espera' => 'required|string|max:255',
            // 'privacidad_info' => 'required|string|max:255',
            // 'experiencia_salud' => 'required|string|max:255',
            // 'recomendacion' => 'required|string|max:255',
            // 'comentarios' => 'nullable|string|max:255',
        ]);
     

        $encuesta = new Registro($validatedData); 
        
        $encuesta->save();

        return redirect()->route('registro.completado')->with('success', 'Encuesta llenada!!');
    }



    /* ATENCION INDIVIDUAL */

    
  

           
    

    
}
