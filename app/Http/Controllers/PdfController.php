<?php

namespace App\Http\Controllers;

use App\Models\FormData;
use Illuminate\Http\Request;
use PDF;
use App\Models\PDF as ModelsPDF;

class PDFController extends Controller
{
    public function showForm()
    {
        return view('form');
    }

    public function saveData(Request $request)
    {
        $data = $request->validate([
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
            'firma' => 'required|string',

        ]);

        FormData::create($data);

        return redirect()->route('show.form');
    }

    public function generatePdf()
    {
        $formData = FormData::latest()->first();

        $pdf = PDF::loadView('pdf.template', compact('formData'));

        return $pdf->download('archivo.pdf');
    }
}