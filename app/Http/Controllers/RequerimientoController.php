<?php

namespace App\Http\Controllers;

use App\Models\implementta;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\DB;

class RequerimientoController extends Controller
{
    public function index($cuenta)
    {
        $existe = DB::select('select count(NoCta)as c from cobranzaExternaHistoricosWS3 where NoCta = ?', [$cuenta]);
        if (($existe[0]->c) == 0) {
            return  redirect()->action(
                [IndexController::class, 'index']
            )->with('error', 'error');
        } else {
            $date = implementta::select('Cuenta', 'Clave', 'Propietario', 'TipoServicio', 'SerieMedidor', DB::raw("Concat(Calle,' ',NumExt,' ',NumInt,' ',Colonia) as Domicilio"))
                ->where('implementta.Cuenta', $cuenta)
                ->get();
            return view('components.formRequerimiento', ['date' => $date]);
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
