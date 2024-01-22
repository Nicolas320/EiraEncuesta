<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreForm;
use App\Models\AtencionIndividual;
use Illuminate\Http\Request;
use App\Models\Registro;
use Illuminate\Support\Facades\DB;
use App\Models\Atencion;
use App\Models\Firma;
use Illuminate\Support\Facades\Log;
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

            $resultadoAtencion = Atencion::create($atencion);

            $firma_digital = array(
                'firma_digital' => $request->input("firma_digital"),
                'registro_id' => $registro_id
            );

            $resultadoFirmaDigital = Firma::create($firma_digital);

            if (is_numeric($resultadoFirmaDigital->id)) {
                return redirect()->route('registro.completado')->with('success', 'Encuesta llenada!!');
            }
        }

        // dd($resultadoRegistro->id);
        // dd($request);
        // $firmaBase64 = base64_encode($request->input('firma'));

        // $validatedData = $request->validate([
        //             'tipo_documento' => 'required|string',
        //             'numero_documento' => 'required|numeric',
        //              'nombres_apellidos' => 'required|string',
        //              'telefono' => 'required|numeric',
        //              'fecha_atencion' => 'required|date',
        //              'municipio_atencion' => 'required|string',
        //              'modalidad_atencion' => 'required|string',
        //             'tiene_alguna_discapacidad' => 'required|string',
        //             'tipo_discapacidad' => 'nullable|string',
        //             'servicio_atendido' => 'required|string',

        //             /* ATENCION */
        //             'trato_personal' => 'required|string|max:255',
        //             'tiempo_espera' => 'required|string|max:255',
        //             'privacidad_info' => 'required|string|max:255',
        //             'experiencia_salud' => 'required|string|max:255',
        //             'recomendacion' => 'required|string|max:255',
        //             'comentarios' => 'nullable|string|max:255',
        //             /* FIRMAS */
        //             'firma' => 'nullable|string',

        //         ]);


        // DB::beginTransaction();

        // try {
        //     // Crear registro
        //     $registro = new Registro($validatedData);
        //     $registro->save();

        //     // Crear atención
        //     $atencion = new Atencion($validatedData);
        //     $atencion->save();

        //     // Guardar la firma en la carpeta 'firmas'
        //     $firmaBase64 = $request->input('firma');
        //     $firmaDecoded = base64_decode($firmaBase64);
        //     $firmaFileName = 'firma_' . time() . '.png'; // Generar un nombre único para la imagen
        //     $firmaPath = 'firmas/' . $firmaFileName;

        //     Storage::put($firmaPath, $firmaDecoded);

        //     // Asociar la firma al registro
        //     $firma = new Firma(['firma' => $firmaPath]);
        //     $registro->firma()->save($firma);

        //     DB::commit();

        //     return redirect()->route('registro.completado')->with('success', 'Encuesta llenada!!');
        // } catch (\Exception $e) {
        //     DB::rollback();
        //     return redirect()->back()->with('error', 'Error al guardar la encuesta.');
        // }
    }

    public function showImage($id)
    {
        $firma = Firma::find($id);

        if (!$firma || empty($firma->firma)) {
            abort(404);
        }

        $imagePath = storage_path('app/' . $firma->firma);
        $imageData = file_get_contents($imagePath);

        return response($imageData)->header('Content-Type', 'image/png');
    }
}


