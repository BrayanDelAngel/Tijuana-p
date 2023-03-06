<?php

namespace App\Http\Controllers;

use App\Models\cobranzaExternaHistoricos;
use App\Models\implementta;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\DB;

class MandamientoController extends Controller
{
    public function index($cuenta)
    {
        $existe=DB::select('select count(NoCta)as c from cobranzaExternaHistoricosWS3 where NoCta = ?', [$cuenta]);
        if(($existe[0]->c)==0){
            return  redirect()->action(
                [IndexController::class, 'index']
            )->with('error', 'error');
        }
        else{
            $sql= cobranzaExternaHistoricos::select(['NoCta','anio','mes'])->where('NoCta',$cuenta)->get();
            $date=implementta::select('Cuenta','Clave','Propietario','TipoServicio','SerieMedidor',DB::raw("Concat(Calle,' ',NumExt,' ',NumInt,' ',Colonia) as Domicilio"))
            ->where('implementta.Cuenta',$cuenta)
            ->get();
           
            $mes=["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Nobiembre","Diciembre"];
            return view('components.formMandamiento',['cobranza'=>$sql,'date'=>$date,'mes'=>$mes]);
            
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
