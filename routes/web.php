<?php

use App\Http\Controllers\DeterminacionController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MandamientoController;
use App\Http\Controllers\RequerimientoController;
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

Route::get('/',[IndexController::class,'index'])->name('index');
//Buscador
Route::post('/search',[IndexController::class,'show'])->name('search');
/*Rutas de Mandamiento */
Route::get('/PDFMandamiento/{id}',[MandamientoController::class,'pdf'])->name('pdf-mandamiento');
Route::get('/formM/{cuenta}',[MandamientoController::class,'index'])->name('formulario-mandamiento');
Route::post('/guardarM',[MandamientoController::class,'store'])->name('guardar-mandamiento');
/*Rutas de Requerimiento*/
Route::get('/formR/{cuenta}',[RequerimientoController::class,'index'])->name('formulario-requerimiento');
Route::post('/guardarR',[RequerimientoController::class,'store'])->name('guardar-requerimiento');
Route::get('/PDFRequerimiento/{cuenta}',[RequerimientoController::class,'pdf'])->name('pdf-requerimiento');
//Determinaciones
Route::get('/PDFDeterminaciones',[DeterminacionController::class,'pdf'])->name('pdf-determinacion');
