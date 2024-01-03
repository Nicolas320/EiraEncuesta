<?php

namespace App\Http\Controllers;

use App\Models\AtencionIndividual;
use Illuminate\Http\Request;
use App\Models\Registro;
use Illuminate\Support\Facades\DB;
use App\Models\Atencion;
use App\Models\Firma;

class FormularioController extends Controller
{

    public function guardarEncuesta(Request $request)

    {
        $firmaBase64 = $request->input('firma');

        // dd($firmaBase64);
        
        $validatedData = $request->validate([
                    'tipo_documento' => 'required|string',
                    'numero_documento' => 'required|numeric',
                     'nombres_apellidos' => 'required|string',
                     'telefono' => 'required|numeric',
                     'fecha_atencion' => 'required|date',
                     'municipio_atencion' => 'required|string',
                     'modalidad_atencion' => 'required|string',
                    'tiene_alguna_discapacidad' => 'required|string',
                    'tipo_discapacidad' => 'nullable|string',
                    'servicio_atendido' => 'required|string', 
                    
                    /* ATENCION */
                    'trato_personal' => 'required|string|max:255',
                    'tiempo_espera' => 'required|string|max:255',
                    'privacidad_info' => 'required|string|max:255',
                    'experiencia_salud' => 'required|string|max:255',
                    'recomendacion' => 'required|string|max:255',
                    'comentarios' => 'nullable|string|max:255',
                    /* FIRMAS */
                     'firma' => 'nullable|string',
                ]);
                
    

        DB::beginTransaction();

        try {
            $registro = new Registro($validatedData);
            // dd($registro);
            $registro->save();

            $atencion = new Atencion($validatedData);
            $atencion->save();

            $firma = new Firma();
            $firma->firma = $validatedData;
            // $firma->save();
            // bobis, lt
            DB::commit();

            return redirect()->route('registro.completado')->with('success', 'Encuesta llenada!!');

        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->back()->with('error', 'Error al guardar la encuesta.');
        }
        

    }

}
