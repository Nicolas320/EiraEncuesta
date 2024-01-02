<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AtencionIndividualController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'atencion_individual' => 'required|array', 
        ]);

        $atencion = new AtencionIndividual();

        $atencion->trato_personal = $request->atencion_individual['trato_personal'];
        $atencion->tiempo_espera = $request->atencion_individual['tiempo_espera'];
        $atencion->privacidad_info = $request->atencion_individual['privacidad_info'];
        $atencion->experiencia_salud = $request->atencion_individual['experiencia_salud'];

        $atencion->save();

        return redirect()->back()->with('success', 'Datos guardados exitosamente');
    }

}
