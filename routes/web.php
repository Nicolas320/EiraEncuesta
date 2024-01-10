<?php

use App\Http\Controllers\AtencionIndividualController;
use App\Http\Controllers\FinEncuestaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\PDFController;

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



Route::get('/formulario', [PDFController::class, 'showForm'])->name('show.form');

Route::post('/guardar-datos', [PDFController::class, 'saveData'])->name('save.data');

Route::get('/generar-pdf', [PDFController::class, 'generatePdf'])->name('generate.pdf');



 



