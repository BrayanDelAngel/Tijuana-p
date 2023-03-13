<?php

namespace App\Http\Controllers;

use App\Models\cobranzaExternaHistoricos;
use App\Models\determinacionesA;
use App\Models\ejecutores_ma;
use App\Models\mandamientosA;
use App\Models\requerimientosA;
use App\Models\tabla_da;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\DB;

class MandamientoController extends Controller
{
    public function index($cuenta)
    {
        //validamos si existe en la tabla de cobranza historicos
        $existe = DB::select('select count(NoCta)as c from cobranzaExternaHistoricosWS3 where NoCta = ?', [$cuenta]);
        //si no existe mandar un error y redireccionarlo al index
        if (($existe[0]->c) == 0) {
            return  redirect()->action(
                [IndexController::class, 'index']
            )->with('error', 'error');
        } 
        //en caso contrario que si existe
        else {
            //consultamos si ya tiene un requerimiento
            $validar=requerimientosA::join('determinacionesA as d','requerimientosA.id_d','=','d.id')
            ->where('d.cuenta',$cuenta)
            ->count();
            //si no tiene un requerimiento mandar un error y redireccionarlo a index
            if (($validar) == 0) {
                return  redirect()->action(
                    [IndexController::class, 'index']
                )->with('accessDeniedMandamiento', 'error');
            } 
            //en caso que ya tiene un requerimiento puede pasar a las operaciones previas
            else {
                //consultamos
                $periodo=tabla_da::select(['anio','mes'])
                ->where('cuenta',$cuenta)->orderBy('meses','ASC')->get();
               
                $date = determinacionesA::join('requerimientosA as r','determinacionesA.id','=','r.id_d')
                ->select(
                    'folio',
                    'fechar as Fecha_r',
                    'cuenta as Cuenta',
                    'clavec as Clave',
                    'fechad as Fecha_remi_c',
                    'fechand',
                    'propietario as Propietario',
                    'r.tipo_s as TipoServicio',
                    'seriem as SerieMedidor',
                    'domicilio as Domicilio',
                    'sobrerecaudador as Recaudador',
                    'r.id',
                    'periodo'
                )
                    ->where('determinacionesA.cuenta', $cuenta)
                    ->get();
                //establecemos los ceros en los folios
                $folio = $date[0]->folio;
                $longitud = strlen($folio);
                if ($longitud <= 5) {
                    while ($longitud < 5) {
                        $folio = "0" . $folio;
                        $longitud = strlen($folio);
                    }
                }
               
                $mes = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Nobiembre", "Diciembre"];
                return view('components.formMandamiento', ['cobranza' => $periodo, 'date' => $date, 'mes' => $mes,'folio'=>$folio]);
            }
        }
    }
    public function store(Request $request)
    {
        

        $request->validate([
            'fecham' =>  ['required'],
            'notificacion' =>  ['required'],
            'sobrerecaudador' =>  ['required'],
        ]);
        if (($request->ejecutor[0]) == null) {
            $request->validate([
                'ejecutor.0' => 'required|array',
            ]);
        }
      
        //validar si esta cuenta ya tiene un mandamiento
        $count_r = DB::select('select count(id) as c from mandamientosA where id_r = ?', [$request->id]);
        //si existe
        if (($count_r[0]->c) != 0) {
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
        $r->fecham = $request->fecham;
        $r->fechanr = $request->notificacion;
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

                return '<script type="text/javascript">window.open("PDFMandamiento/' .$id[0]->id. '")</script>' .
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
        //mando a llamar los datos para el pdf
        $datos=determinacionesA::join('requerimientosA as r','determinacionesA.id','=','r.id_d')
            ->join('mandamientosA as m','r.id','=','m.id_r')
            ->select(['propietario','domicilio','folio'])
            ->where('m.id',$id)
            ->get();
        //agregamos los ceros correspondientes al oficio
        $folio = $datos[0]->folio;
        $longitud = strlen($folio);
        if ($longitud <= 5) {
            while ($longitud < 5) {
                $folio = "0" . $folio;
                $longitud = strlen($folio);
            }
        }
        
        $pdf = Pdf::loadView('pdf.mandamiento',['items'=>$datos,'folio'=>$folio]);
        // setPaper('')->
        //A4 -> carta
        return $pdf->stream();
    }
}
