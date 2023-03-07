<?php

namespace App\Http\Controllers;

use App\Models\cobranzaExternaHistoricos;
use App\Models\ejecutores_ra;
use App\Models\implementta;
use App\Models\requerimientosA;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Carbon\Carbon;
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
            //consultamos los datos ya tenidos del propietario
            $date = implementta::select('Cuenta', 'Clave', 'Propietario', 'TipoServicio', 'SerieMedidor', DB::raw("Concat(Calle,' ',NumExt,' ',NumInt,' ',Colonia) as Domicilio"))
                ->where('implementta.Cuenta', $cuenta)
                ->get();
            //validar si esta cuenta ya tiene un requerimiento
            $count_r = DB::select('select count(id) as c from requerimientosA where cuenta = ?', [$cuenta]);
            //si existe
            if (($count_r[0]->c) != 0) {
                $oficio_c = DB::select('select oficio from requerimientosA where cuenta = ?', [$cuenta]);
                $oficio = $oficio_c[0]->oficio;
            } else {
                $oficio = 0;
            }
            $adeudo = DB::select('select sum(saldoCorriente) as sumaCorriente, sum(saldoIvaCor) as sumaIVA, sum(saldoAtraso) as sumaAtraso, sum(saldoRezago) as sumaRezago, sum(recargosAcum) as sumaRecargoAcomulado, sum(ivaReacum) as IVARezagoAcomulado from cobranzaExternaHistoricosWS3 where NoCta = ?', [$cuenta]);
            $periodo = DB::select("select concat((select format(min(fechaLecturaActual),'dd'' de ''MMMM'' de ''yyyy','es-es')), ' al ' ,(select format(max(fechaLecturaActual),'dd'' de ''MMMM'' de ''yyyy','es-es'))) as periodo from cobranzaExternaHistoricosWS3 where cuentaImplementta=?", [$cuenta]);
            return view('components.formRequerimiento', ['date' => $date, 'oficio' => $oficio,'periodo'=>$periodo]);
        }
    }
    public function store(Request $request)
    {
        // dd($request->ejecutor);
        if (($request->ejecutor[0]) == null) {
            $request->validate([
                'ejecutor.0' => 'required|array',
            ]);
        }

        $request->validate([
            'ncredito' => ['required'],
            'oficio' =>  ['required'],
            'propietario' =>  ['required'],
            'clavec' =>  ['required'],
            'serie' => ['required'],
            'domicilio' =>  ['required'],
            'periodo' =>  ['required'],
            'emision' =>  ['required'],
            'cuenta' =>  ['required'],
            'tservicio' =>  ['required'],
            'remision' =>  ['required'],
            'notificacion' =>  ['required'],
            'sobrerecaudador' =>  ['required'],
        ]);

        //validar si esta cuenta ya tiene un requerimiento
        $count_r = DB::select('select count(id) as c from requerimientosA where cuenta = ?', [$request->cuenta]);
        //si existe
        if (($count_r[0]->c) != 0) {
            //consultar el id del requerimiento
            $id = DB::select('select id from requerimientosA where cuenta = ?', [$request->cuenta]);
            //eliminamos los ejecutores existentes
            $deleted = DB::delete('delete ejecutores_ra where id_r = ?', [$id[0]->id]);
            //declaramos que se va a modificar el registro de requerimiento
            $r = requerimientosA::findOrFail($id[0]->id);
            //validamos que si el oficio es diferente al que inserto que sea unico
            //consultamos su oficio
            $oficio = DB::select('select oficio from requerimientosA where cuenta = ?', [$request->cuenta]);
            if ($oficio[0]->oficio != $request->oficio) {
                $request->validate([
                    'oficio' =>  ['unique:requerimientosA'],
                ]);
            }
        }
        //no existe
        else {
            $request->validate([
                'oficio' =>  ['unique:requerimientosA'],
            ]);
            //declaramos que se creara un nuevo registro en requerimientosA
            $r = new requerimientosA();
        }
        //guardamos los datos en requerimientosA
        $r->numeroc = $request->ncredito;
        $r->oficio = $request->oficio;
        $r->fechar = $request->emision;
        $r->propietario = $request->propietario;
        $r->domicilio = $request->domicilio;
        $r->cuenta = $request->cuenta;
        $r->clavec = $request->clavec;
        $r->tipo_s = $request->tservicio;
        $r->seriem = $request->serie;
        $r->frc = $request->remision;
        $r->fnd = $request->notificacion;
        $r->sobrerecaudador = $request->sobrerecaudador;
        $r->periodo = $request->periodo;
        $r->save();
        //validamos si se guardaron los datos
        if ($r->save()) {
            //consultamos su id
            $id = DB::select('select id from requerimientosA where cuenta = ?', [$request->cuenta]);
            //recorremos el array de los ejecutores
            for ($i = 0; $i < count($request->ejecutor); $i++) {
                //declaramos que se hara un nuevo registro en ejecutores_ra
                $e = new ejecutores_ra();
                $e->ejecutor = $request->ejecutor[$i];
                $e->id_r = $id[0]->id;
                $e->save();
            }
            //si se guardaron los datos retornamos el pdf
            if ($e->save()) {
                return '<script type="text/javascript">window.open("PDFRequerimiento/' . $request->cuenta . '")</script>' .
                    redirect()->action(
                        [IndexController::class, 'index']
                    );
            } else {
                dd("error");
            }
        } else {
            dd("error");
        }
    }
    public function pdf($cuenta)
    {
        $datos = requerimientosA::select(['propietario', 'domicilio', 'oficio', 'numeroc', DB::raw("format(fechar,'dd'' de ''MMMM'' de ''yyyy','es-es') as fechar"), 
        'clavec','seriem','cuenta'])
            ->where('cuenta', $cuenta)
            ->get();
        $pdf = Pdf::loadView('pdf.requerimiento', ['items' => $datos]);
        return $pdf->stream();
    }
}
