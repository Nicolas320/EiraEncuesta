<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreForm;
use App\Models\AtencionIndividual;
use Illuminate\Http\Request;
use App\Models\Registro;
use Illuminate\Support\Facades\DB;
use App\Models\Atencion;
use App\Models\Firma;
use App\Http\Controllers\Image;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class FormularioController extends Controller
{

    public function guardarEncuesta(StoreForm $request)
    {

        $resultadoRegistro = Registro::create($request->all());

        dd($request);

        if (is_numeric($resultadoRegistro->id)) {
            $registro_id = $resultadoRegistro->id;

            $atencion = array(
                'trato_personal' => $request->input("trato_personal"),
                'tiempo_espera' => $request->input("tiempo_espera"),
                'privacidad_info' => $request->input("privacidad_info"),
                'experiencia_salud' => $request->input("experiencia_salud"),
                'resultados_atencion' => $request->input("resultados_atencion"),
                'recomendacion' => $request->input("recomendacion"),
                'comentarios' => $request->input("comentarios"),
                'registro_id' => $registro_id
            );


            if ($request->hasFile('firma')) {
                $firma = $request->file('firma');
                $nombreFirma = time() . '_' . $firma->getClientOriginalName();
                $firma->move(public_path('firmas'), $nombreFirma);

            }

            $resultadoAtencion = Atencion::create($atencion);


            $firma_digital = array(
                'firma_digital' => $request->input("firma_digital"),
                // 'firma'=> $request->input('firma'),
                'registro_id' => $registro_id
            );

            $resultadoFirmaDigital = Firma::create($firma_digital);

            if (is_numeric($resultadoFirmaDigital->id)) {
                return redirect()->route('registro.completado')->with('success', 'Encuesta llenada!!');
            }
        }

    }




}


