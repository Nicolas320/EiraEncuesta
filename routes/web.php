<?php

use App\Http\Controllers\AtencionIndividualController;
use App\Http\Controllers\FinEncuestaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormularioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index.Formulario');
});


//DATOS PERSONALES

Route::get('/finEncuesta', [FinEncuestaController::class, 'fin'])->name('registro.completado');




Route::post('/guardarEncuesta', [FormularioController::class, 'guardarEncuesta'])->name('guardar.registro');







