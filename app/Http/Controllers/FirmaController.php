<?php

namespace App\Http\Controllers;

use App\Models\Firma;


use Illuminate\Http\Request;

class FirmaController extends Controller
{
    public function store(Request $request)
    {
        dd($request);
        $data = $request->validate([
            'firma' => 'required|string',
        ]);

        Firma::create([
            'firma' => $data['firma'],
        ]);

        return redirect('/recoger-firma')->with('success', 'Firma guardada con éxito.');
    }
}
