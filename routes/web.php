<?php

use App\Http\Controllers\DeterminacionController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MandamientoController;
use App\Http\Controllers\RequerimientoController;
use App\Http\Controllers\TarifasController;
use App\Http\Controllers\INPCController;
use Illuminate\Support\Facades\Route;
use Svg\Tag\Rect;

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

Route::get('/index', [IndexController::class, 'index'])->name('index');
//Buscador
Route::get('/search', [IndexController::class, 'show'])->name('search');
//PDF existente
Route::get('/pdf/{cuenta}', [IndexController::class, 'pdf'])->name('pdf');
//Tarifa
Route::get('/tarifa', [TarifasController::class, 'index'])->name('tarifa');
Route::post('/tarifa-store', [TarifasController::class, 'store'])->name('guardar-tarifa');
Route::post('/tarifa-update', [TarifasController::class, 'update'])->name('modificar-tarifa');
//INPC para que agreguen ellos
Route::get('/INPC', [INPCController::class, 'index'])->name('inpc');
Route::post('/INPC-store', [INPCController::class, 'store'])->name('guardar-inpc');
Route::post('/INPC-update', [INPCController::class, 'update'])->name('modificar-inpc');
/*Rutas de Mandamiento */
Route::get('/calculoM/{cuenta}', [MandamientoController::class, 'exec'])->name('calculo');
Route::get('/PDFMandamiento/{id}', [MandamientoController::class, 'pdf'])->name('pdf-mandamiento');
Route::get('/formM/{cuenta}', [MandamientoController::class, 'index'])->name('formulario-mandamiento');
Route::post('/guardarM', [MandamientoController::class, 'store'])->name('guardar-mandamiento');
Route::post('/modalTablaM', [MandamientoController::class, 'update'])->name('modificar_tablaM');
Route::get('/eliminarTablaM/{cuenta}/{meses}', [MandamientoController::class, 'delete'])->name('eliminar_filaM');
/*Rutas de Requerimiento*/
Route::get('/formR/{cuenta}', [RequerimientoController::class, 'index'])->name('formulario-requerimiento');
Route::post('/guardarR', [RequerimientoController::class, 'store'])->name('guardar-requerimiento');
Route::get('/PDFRequerimiento/{id}', [RequerimientoController::class, 'pdf'])->name('pdf-requerimiento');
//Determinaciones
Route::get('/calculo/{cuenta}', [DeterminacionController::class, 'exec'])->name('calculo');
Route::get('/formD/{cuenta}', [DeterminacionController::class, 'index'])->name('formulario-determinacion');
Route::post('/guardarD', [DeterminacionController::class, 'store'])->name('guardar-determinacion');
Route::post('/modalTablaD', [DeterminacionController::class, 'update'])->name('modificar_tabla');
Route::get('/eliminarTablaD/{cuenta}/{meses}', [DeterminacionController::class, 'delete'])->name('eliminar_fila');
Route::get('/PDFDeterminacion/{id}', [DeterminacionController::class, 'pdf'])->name('pdf-determinacion');