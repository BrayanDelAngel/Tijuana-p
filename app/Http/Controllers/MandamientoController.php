<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class MandamientoController extends Controller
{
    
    public function pdf(){
        $pdf = Pdf::loadView('pdf.mandamiento');
        return $pdf->stream();
        //download();
   }
}
