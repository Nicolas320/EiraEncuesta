<?php

namespace App\Http\Controllers;

use App\Models\Atencion;
use App\Models\Firma;
use App\Models\FormData;
use Illuminate\Http\Request;
use App\Models\Registro;

class ResultadosController extends Controller
{
    public function mostrarFormulario()
    {
        return view('index.Resultados');
    }



    public function buscarPorId(Request $request)
    {
        $id = $request->input('id');

        if (!is_numeric($id)) {
            return redirect()->route('formulario.mostrar')->with('error', 'El ID debe ser numérico.');
        }

        $registro = Registro::find($id);

        $atencionIndividual = Atencion::where('registro_id', $id)->first();

        if (!$registro) {
            return redirect()->route('formulario.mostrar')->with('error', 'No se encontró ningún registro con ese ID.');
        }

        return view('index.Resultados', compact('registro', 'atencionIndividual'));
    }


    public function showImage($id)
{
    $firma = Firma::find($id);

    if (!$firma || empty($firma->firma)) {
        abort(404);
    }

    $imageData = base64_decode($firma->firma);

    return response($imageData)->header('Content-Type', 'image/png');
}



}
