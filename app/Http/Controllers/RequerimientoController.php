<?php

namespace App\Http\Controllers;

use App\Models\cobranzaExternaHistoricos;
use App\Models\determinacionesA;
use App\Models\ejecutores_ra;
use App\Models\implementta;
use App\Models\requerimientosA;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Luecano\NumeroALetras\NumeroALetras;

class RequerimientoController extends Controller
{
    public function index($cuenta)
    {
        //validamos si la cuenta existe en la tabla cobranza
        $existe = DB::select('select count(NoCta)as c from cobranzaExternaHistoricosWS3 where NoCta = ?', [$cuenta]);
        //si no existe mandamos un error
        if (($existe[0]->c) == 0) {
            return  redirect()->action(
                [IndexController::class, 'index']
            )->with('error', 'error');
        } 
        //si existe
        else {
            //consultamos si ya tiene una determinacion
            $determinacion = DB::select('select count(cuenta) as c from determinacionesA where cuenta=?', [$cuenta]);
            //si no tiene mandamos un alert que primero nececita una determinacion
            if (($determinacion[0]->c) == 0) {
                return  redirect()->action(
                    [IndexController::class, 'index']
                )->with('accessDeniedRequerimiento', 'error');
            } 
            //en caso que ya tiene una determinacion
            else {
                //consultamos los datos para la tabla
                $sql = cobranzaExternaHistoricos::select(['NoCta', 'anio', 'mes'])->where('NoCta', $cuenta)->orderBy('anio', 'ASC')->get();
                //consultamos el id de la determinacion
                $id = DB::select('select id from determinacionesA where cuenta = ?', [$cuenta]);
                //consultamos los datos de la tabla de determinacion
                $date = determinacionesA::select(
                    'folio',
                    'propietario as Propietario',
                    'clavec as Clave',
                    'seriem as SerieMedidor',
                    'domicilio as Domicilio',
                    'cuenta as Cuenta',

                    'fechad',
                    'id',
                    'periodo'
                )
                    ->where('id', $id[0]->id)
                    ->get();
                $tipos = implementta::select('TipoServicio')
                ->where('implementta.Cuenta', $cuenta)
                ->get();
                //validamos el tipo de servicio
                if ($tipos[0]->TipoServicio=="C") {
                    $ts="COMERCIAL";
                } else if($tipos[0]->TipoServicio=="R") {
                    $ts='RESIDENCIAL';
                }
                else if($tipos[0]->TipoServicio=="I") {
                    $ts="INDUSTRIAL";
                }
                else if($tipos[0]->TipoServicio=="G") {
                    $ts="GOBIERNO";
                }
                else if($tipos[0]->TipoServicio=="") {
                    $ts="NO APLICA";
                }
                else {
                    $ts=$tipos[0]->TipoServicio;
                }
                //establecemos los ceros en los folios
                $folio=$date[0]->folio;
                $longitud=strlen($folio);
                if($longitud<=5){
                    while($longitud<5){
                        $folio="0".$folio;
                        $longitud=strlen($folio);
                    }
                }
               
                return view('components.formRequerimiento', ['date' => $date, 'folio' => $folio,'ts'=>$ts]);
            }
        }
    }
    public function store(Request $request)
    {
        // dd($request->ejecutor);
        

        $request->validate([
            'emision' =>  ['required'],
            'tservicio' =>  ['required'],
            'notificacion' =>  ['required'],
            'sobrerecaudador' =>  ['required'],
        ]);
        if (($request->ejecutor[0]) == null) {
            $request->validate([
                'ejecutor.0' => 'required|array',
            ]);
        }

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

        $datos = requerimientosA::select([
            'propietario', 'domicilio', 'oficio', 'numeroc', DB::raw("format(fechar,'dd'' de ''MMMM'' de ''yyyy','es-es') as fechar"),
            'clavec', 'seriem', 'cuenta', 'periodo', DB::raw("format(fnd,'dd'' de ''MMMM','es-es') as fd"), 'fnd','sobrerecaudador'
        ])
            ->where('cuenta', $cuenta)
            ->get();
        $formato = new NumeroALetras();
        $f = strtotime($datos[0]->fnd);
        $anio = date("Y",$f);
        $conversion = $formato->toString($anio);
        $fechaNotiDeter = $datos[0]->fd .' de '.mb_strtolower(substr($conversion, 0, -1),"UTF-8");
        $pdf = Pdf::loadView('pdf.requerimiento', ['items' => $datos,'fechaNotiDeter'=>$fechaNotiDeter]);
        return $pdf->stream();
    }
}
