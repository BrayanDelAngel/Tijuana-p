<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Svg\Tag\Rect;

class DeterminacionController extends Controller
{
    public function index()
    {
        return view('components.formDeterminacion');
    }
    public function store(Request $request)
    {
        return '<script type="text/javascript">window.open("PDFDeterminacion")</script>' .
            redirect()->action(
                [IndexController::class, 'index']
            );
    }
    public function pdf()
    {
        $pdf = Pdf::loadView('pdf.determinacion');
        // setPaper('')->
        //A4 -> carta
        return $pdf->stream();
    }
}
