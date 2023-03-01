<?php

use App\Http\Controllers\DeterminacionesController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MandamientoController;
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

// Route::get('/', function () {
//     // $pdf=App::make('dompdf.wrapper');
//     $pdf=PDF::loadHTML('<h1>Hola mundo desde FAcade</h1>');
//     return $pdf->stream();
// });
Route::get('/',[IndexController::class,'index'])->name('index');
Route::get('/PDFMandamiento',[MandamientoController::class,'pdf'])->name('pdf-mandamiento');