<?php

namespace App\Http\Controllers;

use App\Models\cobranzaExternaHistoricos;
use App\Models\requerimientosA;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\DB;

class MandamientoController extends Controller
{
    public function index($cuenta)
    {
        $existe = DB::select('select count(NoCta)as c from cobranzaExternaHistoricosWS3 where NoCta = ?', [$cuenta]);
        if (($existe[0]->c) == 0) {
            return  redirect()->action(
                [IndexController::class, 'index']
            )->with('error', 'error');
        } else {
            $requerimiento = DB::select('select count(cuenta) as c from requerimientosA where cuenta=?', [$cuenta]);
            if (($requerimiento[0]->c) == 0) {
                return  redirect()->action(
                    [IndexController::class, 'index']
                )->with('accessDeniedMandamiento', 'error');
            } else {
                $sql = cobranzaExternaHistoricos::select(['NoCta', 'anio', 'mes'])->where('NoCta', $cuenta)->orderBy('anio', 'ASC')->get();
                $count = cobranzaExternaHistoricos::select('anio', 'mes')->where('NoCta', $cuenta)->orderBy('anio', 'ASC')->count();
                $periodo = cobranzaExternaHistoricos::select('anio', 'mes')->where('NoCta', $cuenta)->orderBy('anio', 'ASC')->get();
                $date = requerimientosA::select('numeroc as Numero','oficio as Oficio','fechar as Fecha_r','cuenta as Cuenta', 'clavec as Clave', 
                'frc as Fecha_remi_c','fnd as Fecha_noti_d','propietario as Propietario', 'tipo_s as TipoServicio', 'seriem as SerieMedidor', 'domicilio as Domicilio','sobrerecaudador as Recaudador')
                    ->where('requerimientosA.cuenta', $cuenta)
                    ->get();
                $periodoI=$periodo[0]->anio.'-'.$periodo[0]->mes;
                $periodoF=$periodo[$count-1]->anio.'-'.$periodo[$count-1]->mes;
                $mes = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Nobiembre", "Diciembre"];
                return view('components.formMandamiento', ['cobranza' => $sql, 'date' => $date, 'mes' => $mes,'periodoI'=>$periodoI,'periodoF'=>$periodoF]);
            }
        }
    }
    public function store(Request $request)
    {

        $request->validate([
            'ncredito' => ['required'],
            'ejecutor.0' => ['required', 'array'],
            'oficio' =>  ['required'],
            'propietario' =>  ['required'],
            'clavec' =>  ['required'],
            'serie' => ['required'],
            'domicilio' =>  ['required'],
            'mandamiento' =>  ['required'],
            'emision' =>  ['required'],
            'cuenta' =>  ['required'],
            'tservicio' =>  ['required'],
            'remision' =>  ['required'],
            'notificacion' =>  ['required'],
            'sobrerecaudador' =>  ['required'],
        ]);
        dd($request->all());
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
