<?php

namespace App\Http\Controllers;

use App\Models\cobranzaExternaHistoricos;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\DB;

class MandamientoController extends Controller
{
    public function index($cuenta)
    {
       
        //  $sql=cobranzaExternaHistoricos::all()->where('cobranzaExternaHistoricosWS3.NoCta','=',$cuenta)->paginate(5);
        //  $sql=cobranzaExternaHistoricos::all()->paginate(5);
        $existe=DB::select('select count(NoCta)as c from cobranzaExternaHistoricosWS3 where NoCta = ?', [$cuenta]);
        if(($existe[0]->c)==0){
            dd("no existe");
        }
        else{
            $sql= cobranzaExternaHistoricos::select(['NoCta','anio','mes'])->where('NoCta',$cuenta)->get();
            $mes=["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Nobiembre","Diciembre"];

            // dd($mes[1]);
            return view('components.formMandamiento',['cobranza'=>$sql,'mes'=>$mes]);
        }
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
