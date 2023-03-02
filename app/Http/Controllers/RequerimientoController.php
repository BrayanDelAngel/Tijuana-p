<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class RequerimientoController extends Controller
{
    public function index()
    {
        return view('components.formRequerimiento');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        return '<script type="text/javascript">window.open("PDFRequerimiento")</script>' .
            redirect()->action(
                [IndexController::class, 'index']
            );
    }
    public function pdf()
    {
        $pdf = Pdf::loadView('pdf.requerimiento');
        return $pdf->stream();
    }
}
