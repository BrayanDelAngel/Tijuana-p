<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
class DeterminacionesController extends Controller
{
    // public function index(){
    //     return view('layouts.index');
    // }
    public function pdf(){
         $pdf = Pdf::loadView('pdf.determinaciones');
         return $pdf->stream();
         //download();
    }
}
