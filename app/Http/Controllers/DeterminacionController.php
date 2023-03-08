<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DeterminacionController extends Controller
{
    public function pdf()
    {
        // $datos=requerimientosA::
        //         select(['propietario','domicilio','oficio','numeroc'])
        //         ->where('id',$id)
        //         ->get();

        $pdf = Pdf::loadView('pdf.determinacion');
        // setPaper('')->
        //A4 -> carta
        return $pdf->stream();
    }
}
