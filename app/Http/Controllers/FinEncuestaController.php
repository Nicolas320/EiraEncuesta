<?php

namespace App\Http\Controllers;
use App\Models\Registro;  // Asegúrate de importar el modelo Registro aquí


use Illuminate\Http\Request;

class FinEncuestaController extends Controller
{
    public function fin(){
        return view('index.Finformulario');
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
