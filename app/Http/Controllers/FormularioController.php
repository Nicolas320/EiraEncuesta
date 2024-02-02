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

            $resultadoAtencion = Atencion::create($atencion);

            if ($request->hasFile('firma')) {
                // dd($request->hasFile('firma'));
                $directory = 'public/firmas';
                $extension = 'png';
                $nombre = 'firma_' . $identificacion. '.' . $extension;
                // dd($nombre);
                $url = $request->file('firma')->storePubliclyAs($directory, $nombre, 'local');
                // $url = $request->file('firma')->storePublicly($directory);
                // dd($url);
            }

            // $firma_digital = array(
            //     'firma_digital' => $request->input("firma_digital"),
            //     'firma'=> isset($carpeta) ? $carpeta . '/' . $nombreFirma : null, // Ruta completa de la firma
            //     'registro_id' => $registro_id
            // );

            // $resultadoFirmaDigital = Firma::create($firma_digital);

            if (is_numeric($resultadoAtencion->id)) {
                return redirect()->route('registro.completado')->with('success', 'Encuesta llenada!!');
            }
        }
    }
}
