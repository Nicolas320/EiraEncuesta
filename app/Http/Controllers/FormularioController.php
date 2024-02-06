<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreForm;
use App\Models\Atencion;
use App\Models\Firma;
use App\Models\Registro;
use Illuminate\Support\Facades\Storage;

class FormularioController extends Controller
{

    // public function guardarEncuesta(StoreForm $request)
    public function guardarEncuesta(StoreForm $request)
    {
        // dd($request);

        $identificacion = $request->input("numero_documento");

        $resultadoRegistro = Registro::create($request->all());

        if (is_numeric($resultadoRegistro->id)) {
            $registro_id = $resultadoRegistro->id;

            $atencion = [
                'trato_personal' => $request->input("trato_personal"),
                'tiempo_espera' => $request->input("tiempo_espera"),
                'privacidad_info' => $request->input("privacidad_info"),
                'experiencia_salud' => $request->input("experiencia_salud"),
                'resultados_atencion' => $request->input("resultados_atencion"),
                'recomendacion' => $request->input("recomendacion"),
                'comentarios' => $request->input("comentarios"),
                'registro_id' => $registro_id
            ];

            $resultadoAtencion = Atencion::create($atencion);

            if ($request->hasFile('firma')) {
                $directory = 'public/firmas';
                $extension = $request->file('firma')->getClientOriginalExtension();
                $nombre = 'firma_' . $identificacion . '.' . $extension;
                $url = $request->file('firma')->storePubliclyAs($directory, $nombre, 'local');

                Firma::create(['firma' => $url, 'registro_id' => $registro_id]);

                $atencion['firma'] = $url;

                //FIRMA DIGITAL















                if (is_numeric($resultadoAtencion->id)) {
                    return redirect()->route('registro.completado')->with('success', 'Encuesta llenada!!');
                }
            }
        }
    }
}
