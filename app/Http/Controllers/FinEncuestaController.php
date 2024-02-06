<?php

namespace App\Http\Controllers;
use App\Models\Registro;
use App\Models\Subdirectorio\FinEncuesta;
use Illuminate\Http\Request;

class FinEncuestaController extends Controller
{
    public function fin(){
        return view('index.Finformulario');
    }

    public function pdf()
    {
        $index = FinEncuesta::all();

        // Crear una instancia de la clase PDF
        $pdf = app('dompdf.wrapper');

        // Cargar la vista en la instancia del PDF
        $pdf->loadView('index.pdf', compact('index'));

        // Devolver el PDF para ser mostrado o descargado
        return $pdf->stream();
    }

    // BUSCADOR POR ID

    public function buscar(Request $request)
    {
        $query = $request->input('query');

        $registros = Registro::where('nombres_apellidos', 'LIKE', "%$query%")
                            ->orWhere('numero_documento', 'LIKE', "%$query%")
                            ->orWhere('telefono', 'LIKE', "%$query%")
                            ->select('id', 'tipo_documento', 'numero_documento', 'nombres_apellidos', 'telefono')
                            ->get();

        return view('index.Finformulario', ['registros' => $registros]);
    }








}
