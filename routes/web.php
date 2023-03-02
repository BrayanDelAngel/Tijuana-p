<?php

use App\Http\Controllers\DeterminacionesController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MandamientoController;
use App\Http\Controllers\RequerimientoController;
use Illuminate\Support\Facades\Route;
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
//Mandamiento pdf
Route::get('/PDFMandamiento',[MandamientoController::class,'pdf'])->name('pdf-mandamiento');
/*Rutas de Requerimiento*/
Route::get('/formR',[RequerimientoController::class,'index'])->name('formulario-requerimiento');
//Requerimiento Pdf
Route::get('/PDFRequerimiento',[RequerimientoController::class,'pdf'])->name('pdf-requerimiento');