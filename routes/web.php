<?php

use App\Http\Controllers\ConsultaController;
use App\Models\Paciente;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ExpedienteController;
use App\Http\Controllers\GeneradordePDFController;
use App\Http\Controllers\RecetasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$controller_path = 'App\Http\Controllers';

// Main Page Route

// pages


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    $controller_path = 'App\Http\Controllers';

    Route::get('/', $controller_path . '\pages\HomePage@index')->name('pages-home');
    Route::get('/page-2', $controller_path . '\pages\Page2@index')->name('pages-page-2');

    // ieRoute::get('/pacntes', function () {
    //     return view('pacientes.index');
    // });

    //Route::get('pacientes/create', [PacienteController::class,'create']);
    
    Route::resource('pacientes', PacienteController::class);
    Route::resource('recetas', RecetasController::class);
    Route::get('/recetas/{id}/pdf', [GeneradordePDFController::class, 'generarPDF'])->name('recetas.pdf');

    Route::resource('events', EventController::class);
    Route::resource('pacientes', PacienteController::class);
    Route::resource('expedientes', ExpedienteController::class);
    Route::resource('Recetas', RecetasController::class);
    Route::resource('consultas', ConsultaController::class);
});
