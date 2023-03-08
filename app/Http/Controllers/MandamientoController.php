<?php

namespace App\Http\Controllers;

use App\Models\cobranzaExternaHistoricos;
use App\Models\ejecutores_ma;
use App\Models\mandamientosA;
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
               
                $date = requerimientosA::select(
                    'numeroc as Numero',
                    'oficio as Oficio',
                    'fechar as Fecha_r',
                    'cuenta as Cuenta',
                    'clavec as Clave',
                    'frc as Fecha_remi_c',
                    'fnd as Fecha_noti_d',
                    'propietario as Propietario',
                    'tipo_s as TipoServicio',
                    'seriem as SerieMedidor',
                    'domicilio as Domicilio',
                    'sobrerecaudador as Recaudador',
                    'id',
                    'periodo'
                )
                    ->where('requerimientosA.cuenta', $cuenta)
                    ->get();
               
                $mes = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Nobiembre", "Diciembre"];
                return view('components.formMandamiento', ['cobranza' => $sql, 'date' => $date, 'mes' => $mes]);
            }
        }
    }
    public function store(Request $request)
    {
        if (($request->ejecutor[0]) == null) {
            $request->validate([

                'ejecutor.0' => 'required|array',

            ]);
        }

        $request->validate([
            'mandamiento' =>  ['required'],
            'determinacion' => ['required'],
            'notificacion' =>  ['required'],
            'sobrerecaudador' =>  ['required'],
        ]);
      
        //validar si esta cuenta ya tiene un mandamiento
        $count_r = DB::select('select count(id) as c from mandamientosA where id_r = ?', [$request->id]);
        //si existe
        if (($count_r[0]->c) != 0) {
            dd($request->all());
            //consultar el id del mandamiento
            $id = DB::select('select id from mandamientosA where id_r = ?', [$request->id]);
            //eliminamos los ejecutores existentes
            $deleted = DB::delete('delete ejecutores_ma where id_m = ?', [$id[0]->id]);
            //declaramos que se va a modificar el registro de requerimiento
            $r = mandamientosA::findOrFail($id[0]->id);
            
        }
        //no existe
        else {
           
            //declaramos que se creara un nuevo registro en mandamientosA
            $r = new mandamientosA();
        }
        //guardamos los datos en requerimientosA
        $r->fm = $request->mandamiento;
        $r->fd = $request->determinacion;
        $r->fnr = $request->notificacion;
        $r->sobrerecaudador = $request->sobrerecaudador;
        $r->id_r = $request->id;
        $r->save();

        //validamos si se guardaron los datos
        if ($r->save()) {
            //consultamos su id
            $id = DB::select('select id from mandamientosA where id_r = ?', [$request->id]);
            //recorremos el array de los ejecutores
            for ($i = 0; $i < count($request->ejecutor); $i++) {
                //declaramos que se hara un nuevo registro en ejecutores_ra
                $e = new ejecutores_ma();
                $e->ejecutor = $request->ejecutor[$i];
                $e->id_m = $id[0]->id;
                $e->save();
            }
            //si se guardaron los datos retornamos el pdf
            if ($e->save()) {

                return '<script type="text/javascript">window.open("PDFMandamiento/' . $request->id . '")</script>' .
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
    public function pdf($id)
    {
        $datos=requerimientosA::
                select(['propietario','domicilio','oficio','numeroc'])
                ->where('id',$id)
                ->get();

        $pdf = Pdf::loadView('pdf.mandamiento',['items'=>$datos]);
        // setPaper('')->
        //A4 -> carta
        return $pdf->stream();
    }
}
