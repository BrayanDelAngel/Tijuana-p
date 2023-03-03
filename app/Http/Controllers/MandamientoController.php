<?php

namespace App\Http\Controllers;

use App\Models\cobranzaExternaHistoricos;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class MandamientoController extends Controller
{
    public function index($cuenta)
    {
       
        //  $sql=cobranzaExternaHistoricos::all()->where('cobranzaExternaHistoricosWS3.NoCta','=',$cuenta)->paginate(5);
        //  $sql=cobranzaExternaHistoricos::all()->paginate(5);
        $sql= cobranzaExternaHistoricos::select(['NoCta','anio','mes'])->where('NoCta',$cuenta)->get();
        // dd($sql);
        return view('components.formMandamiento',['cobranza'=>$sql]);
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
