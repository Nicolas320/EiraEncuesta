<?php

// use App\Http\Controllers\AtencionIndividualController;
use App\Http\Controllers\FinEncuestaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormularioController;
// use App\Http\Controllers\GeneradorPDF;
use App\Http\Controllers\ResultadosController;
// use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Artisan;

// use App\Models\Registro;


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

// PDF
Route::get('/index.pdf  ', [FinEncuestaController::class, 'pdf'])->name('index.pdf');


//DATOS PERSONALES

Route::get('/finEncuesta', [FinEncuestaController::class, 'fin'])->name('registro.completado');



// BUSCAR REGISTROS

Route::get('/buscar', [FinEncuestaController::class, 'buscar'])->name('buscar.registros');

Route::get('/finEncuesta', [FinEncuestaController::class, 'fin'])->name('registro.completado');

Route::post('/guardarEncuesta', [FormularioController::class, 'guardarEncuesta'])->name('guardar.registro');


// FIRMA GET

Route::get('firma/image/{id}', 'FirmaController@showImage')->name('firma.image');



//RUTAS PDF

// Route::get('/pdf', [ResultadosController::class, 'mostrarFormulario']);

Route::get('/mostrar-formulario', [ResultadosController::class, 'mostrarFormulario'])->name('formulario.mostrar');

Route::post('/buscar-por-id', [ResultadosController::class, 'buscarPorId'])->name('formulario.buscarPorId');

// /* storage link */
Route::get('storage-link', function(){
    Artisan::call('storage:link');
    echo 'link generado';
});




