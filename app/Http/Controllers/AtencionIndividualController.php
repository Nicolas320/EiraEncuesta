<?php

namespace App\Http\Controllers;

use App\Models\Atencion;
use Illuminate\Http\Request;

class AtencionIndividualController extends Controller
{
    public function atencion(Request $request)
    {
        dd($request);
        $validatedData = $request->validate([
            'trato_personal' => 'required|string|max:255',
            'tiempo_espera' => 'required|string|max:255',
            'privacidad_info' => 'required|string|max:255',
            'experiencia_salud' => 'required|string|max:255',
            'recomendacion' => 'required|string|max:255',
            'comentarios' => 'nullable|string|max:255'
        ]);

        $encuesta = new Atencion($validatedData); 

        $encuesta->save();

        return redirect()->route('registro.completado')->with('success', 'Encuesta llenada!!');




    }
}
