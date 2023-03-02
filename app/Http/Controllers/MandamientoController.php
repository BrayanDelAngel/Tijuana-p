<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class MandamientoController extends Controller
{
    public function index()
    {
        return view('components.formMandamiento');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        return '<script type="text/javascript">window.open("PDFMandamiento")</script>' .
            redirect()->action(
                [IndexController::class, 'index']
            );
    }
    public function pdf()
    {
        $pdf = Pdf::loadView('pdf.mandamiento');
        // setPaper('')->
        //A4 -> carta
        return $pdf->stream();
    }
}
