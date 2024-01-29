<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreForm;
use App\Models\Atencion;
use App\Models\Firma;
use App\Models\Registro;
use Illuminate\Support\Facades\Storage;

class FormularioController extends Controller
{

    public function guardarEncuesta(StoreForm $request)
    {
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

            if ($request->hasFile('firma')) {
                $firma = $request->file('firma');

                // Crear una carpeta con el nombre del registro_id en el directorio 'firmas'
                $carpeta = 'firmas/' . $registro_id;
                Storage::makeDirectory($carpeta);

                // Generar un nombre único para la imagen
                $nombreFirma = time() . '_' . $firma->getClientOriginalName();

                // Mover la imagen a la carpeta recién creada
                $firma->storeAs($carpeta, $nombreFirma);

            }

            $resultadoAtencion = Atencion::create($atencion);

            $firma_digital = array(
                'firma_digital' => $request->input("firma_digital"),
                'firma'=> isset($carpeta) ? $carpeta . '/' . $nombreFirma : null, // Ruta completa de la firma
                'registro_id' => $registro_id
            );

            $resultadoFirmaDigital = Firma::create($firma_digital);

            if (is_numeric($resultadoFirmaDigital->id)) {
                return redirect()->route('registro.completado')->with('success', 'Encuesta llenada!!');
            }
        }
    }

    // Otros métodos del controlador...

}
