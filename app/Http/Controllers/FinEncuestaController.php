<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinEncuestaController extends Controller
{
    public function fin(){
        return view('index.Finformulario');
    }
}
