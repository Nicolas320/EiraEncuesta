<?php

use App\Http\Controllers\AtencionIndividualController;
use App\Http\Controllers\FinEncuestaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\GeneradorPDF;
use App\Http\Controllers\ResultadosController;
use App\Http\Controllers\PDFController;

use App\Models\Registro;


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



// BUSCAR REGISTROS

Route::get('/buscar', [FinEncuestaController::class, 'buscar'])->name('buscar.registros');

Route::get('/finEncuesta', [FinEncuestaController::class, 'fin'])->name('registro.completado');


Route::post('/guardarEncuesta', [FormularioController::class, 'guardarEncuesta'])->name('guardar.registro');


// FIRMA GET

Route::get('firma/image/{id}', 'FirmaController@showImage')->name('firma.image');



//RUTAS PDF

Route::get('/pdf', [ResultadosController::class, 'mostrarFormulario']);

Route::get('/mostrar-formulario', [ResultadosController::class, 'mostrarFormulario'])->name('formulario.mostrar');

Route::post('/buscar-por-id', [ResultadosController::class, 'buscarPorId'])->name('formulario.buscarPorId');

// PDF 2
 Route::get('/index/pdf  ', [PDFController::class, 'pdf'])->name('index.pdf');




