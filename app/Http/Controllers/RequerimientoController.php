<?php

namespace App\Http\Controllers;

use App\Models\cobranzaExternaHistoricos;
use App\Models\determinacionesA;
use App\Models\ejecutores_ra;
use App\Models\implementta;
use App\Models\requerimientosA;
use App\Models\tabla_da;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Luecano\NumeroALetras\NumeroALetras;
use NumberFormatter;

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
                    'multas',
                    'gastos_ejecucion',
                    'conv_vencido',
                    'otros_gastos',
                    'saldo_total as total',
                    'fechad',
                    'id',
                    'periodo'
                )
                    ->where('id', $id[0]->id)
                    ->get();
                $multas = $date[0]->multas;
                $gastos_ejecucion = $date[0]->gastos_ejecucion;
                $conv_vencido = $date[0]->conv_vencido;
                $otros_gastos = $date[0]->otros_gastos;
                //obtenemos los datos de la tabla adeudo
                $t_adeudo_t = tabla_da::select(['totalPeriodo', 'RecargosAcumulados', DB::raw("(RecargosAcumulados+totalPeriodo) as total")])
                    ->where('cuenta', $cuenta)->orderBy('meses', 'ASC')->first();
                $tipos = implementta::select('TipoServicio')
                    ->where('implementta.Cuenta', $cuenta)
                    ->get();
                //validamos el tipo de servicio
                if ($date[0]->TipoServicio == "R" || $date[0]->TipoServicio == "RESIDENCIAL") {
                    $ts = 'DOMESTICO';
                } else {
                    $ts = 'NO DOMESTICO';
                }
                //establecemos los ceros en los folios
                $folio = $date[0]->folio;
                $longitud = strlen($folio);
                if ($longitud <= 5) {
                    while ($longitud < 5) {
                        $folio = "0" . $folio;
                        $longitud = strlen($folio);
                    }
                }
                $total_ar = $t_adeudo_t->totalPeriodo + $t_adeudo_t->RecargosAcumulados + number_format($date[0]->multas, 2) + $date[0]->gastos_ejecucion + $date[0]->conv_vencido + $date[0]->otros_gastos;
                //extraemos el entero
                $entero = floor($total_ar);
                //extraemos el decimal
                $decimal = round($total_ar - $entero, 2) * 100;
                //convertiremos el total del adeudo requerido en letras
                $formatter = new NumeroALetras();
                //convertimos en texto el entero
                $texto_entero = $formatter->toMoney($entero);
                //concatenamos para obtener todo el texto
                $tar = ' (' . $texto_entero . ' ' . $decimal . '/100 Moneda Nacional)';
                return view('components.formRequerimiento', [
                    'date' => $date,
                    'folio' => $folio,
                    'ts' => $ts,
                    'multas' => $multas,
                    'gastos_ejecucion' => $gastos_ejecucion,
                    'conv_vencido' => $conv_vencido,
                    'otros_gastos' => $otros_gastos,
                    't_adeudo_t' => $t_adeudo_t,
                    'total_ar' => number_format($total_ar, 2),
                    'tar' => $tar,
                ]);
            }
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'emision' =>  ['required'],
            'tservicio' =>  ['required'],
            'notificacion' =>  ['required'],
            'sobrerecaudador' =>  ['required'],
        ]);
        //validar si esta cuenta ya tiene un requerimiento
        $validar = requerimientosA::join('determinacionesA as d', 'requerimientosA.id_d', '=', 'd.id')
            ->where('d.id', $request->id_d)
            ->count();
        //si existe

        if ($validar != 0) {
            //consultar el id del requerimiento
            $id = requerimientosA::select('id')->where('id_d', $request->id_d)->first();
            //eliminamos los ejecutores existentes

            $ejecutores_ra = ejecutores_ra::where('id_r', $id->id)->delete();
            //declaramos que se va a modificar el registro de requerimiento
            $r = requerimientosA::findOrFail($id->id);
        }
        //no existe
        else {
            //declaramos que se creara un nuevo registro en requerimientosA
            $r = new requerimientosA();
        }
        //guardamos los datos en requerimientosA
        $r->id_d = $request->id_d;
        $r->fechar = $request->emision;
        $r->fechand = $request->notificacion;
        $r->sobrerecaudador = $request->sobrerecaudador;
        $r->tipo_s = $request->tservicio;
        $r->save();
        //validamos si se guardaron los datos
        if ($r->save()) {
            //consultamos su id
            $requirimiento = requerimientosA::select('id')->where('id_d', $request->id_d)->first();
            $id = $requirimiento->id;

            //recorremos el array de los ejecutores
            for ($i = 0; $i < count($request->ejecutor); $i++) {
                //declaramos que se hara un nuevo registro en ejecutores_ra
                $e = new ejecutores_ra();
                //Si el ejecutor es nulo se le agrega a la tabla none 
                if ($request->ejecutor[$i] == null) {
                    $e->ejecutor = 'none';
                }
                //Si no se agrega el ejecutor recibido 
                else {
                    $e->ejecutor = $request->ejecutor[$i];
                }
                $e->id_r = $id;
                $e->save();
            }
            //si se guardaron los datos retornamos el pdf
            if ($e->save()) {
                return '<script type="text/javascript">window.open("PDFRequerimiento/' . $id . '")</script>' .
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
        //Consulta de la determinacion y del requerimiento
        $datos = determinacionesA::join('requerimientosA as r', 'r.id_d', '=', 'determinacionesA.id')
            ->select([
                'r.id', 'folio', DB::raw("format(fechad,'dd'' de ''MMMM','es-es') as fechad"),
                'cuenta', 'propietario', 'domicilio', 'clavec', 'r.tipo_s as tipo_s', 'seriem', 'razons', 'periodo', 'fechand',
                DB::raw("format(fechar,'dd'' de ''MMMM'' de ''yyyy','es-es') as fechar"),
                DB::raw(
                    "format(fechand,'dd'' de ''MMMM','es-es') as fd",
                    'id_d'
                ),
                'multas',
                'gastos_ejecucion',
                'conv_vencido',
                'otros_gastos',
                'saldo_total as total',
                'sobrerecaudador'
            ])
            ->where('r.id', $id)
            ->get();
        //obtenemos los datos de la tabla adeudo
        $t_adeudo_t = tabla_da::select(['totalPeriodo', 'RecargosAcumulados', DB::raw("(RecargosAcumulados+totalPeriodo) as total")])
            ->where('cuenta', $datos[0]->cuenta)->orderBy('meses', 'ASC')->first();
        //convertivos la fecha en año para convertirlo en texto y concatenarlo con la fecha fd
        $formato = new NumeroALetras();
        //Convirtiendo la fecha en fecha corta
        $f = strtotime($datos[0]->fechand);
        //Extrayendo el año
        $anio = date("Y", $f);
        //Convirtiendo el año en letra ejemplo 2020 en dos mil veite
        $conversion = $formato->toString($anio);
        //Concatenando la fecha
        $fechaNotiDeter = $datos[0]->fd . ' de ' . mb_strtolower(substr($conversion, 0, -1), "UTF-8");
        //establecemos los ceros en los folios
        $folio = $datos[0]->folio;
        $longitud = strlen($folio);
        if ($longitud <= 5) {
            while ($longitud < 5) {
                $folio = "0" . $folio;
                $longitud = strlen($folio);
            }
        }
        //convertiremos el total del adeudo requerido en letras
        $formatter = new NumeroALetras();
        //obtenemos el total del adeuto requerido
        $total_ar = $t_adeudo_t->totalPeriodo + $t_adeudo_t->RecargosAcumulados + number_format($datos[0]->multas, 2) + $datos[0]->gastos_ejecucion + $datos[0]->conv_vencido + $datos[0]->otros_gastos;
        //extraemos el entero
        $entero = floor($total_ar);
        //extraemos el decimal
        $decimal = round($total_ar - $entero, 2) * 100;
        //convertimos en texto el entero
        $texto_entero = $formatter->toMoney($entero);
        //concatenamos para obtener todo el texto
        $tar = ' (' . $texto_entero . ' ' . $decimal . '/100 Moneda Nacional)';
        //Obtenemos los ejecutores
        $ejecutores = requerimientosA::join('ejecutores_ra as e', 'e.id_r', '=', 'requerimientosA.id')->select('ejecutor')->where('id', $id)->get();
        //Conteo del total de ejecutores
        $count_ejecutor = requerimientosA::join('ejecutores_ra as e', 'e.id_r', '=', 'requerimientosA.id')->select('ejecutor')->where('id', $id)->count();
        //Formateando ejecutores
        $ejecutoresformat = '';
        //Se he un recorrido
        for ($i = 0; $i < $count_ejecutor; $i++) {
            if ($ejecutores[$i]->ejecutor != 'none') {
                //si el ultimo dato 
                if ($i == ($count_ejecutor - 1)) {
                    // en el amcomulador se le agrega un Y
                    $ejecutoresformat = $ejecutoresformat . ' y ' . $ejecutores[$i]->ejecutor;
                } else if ($i == ($count_ejecutor - 2)) {
                    // si es el penultimo no se le agrega el ','
                    $ejecutoresformat = $ejecutoresformat .  $ejecutores[$i]->ejecutor . '';
                } else {
                    // si no re acomulan los años y se les agrega las ','
                    $ejecutoresformat = $ejecutoresformat .  $ejecutores[$i]->ejecutor . ',';
                }
            } else {
                $ejecutoresformat = 'none';
            }
        }
        //declaramos la variable pdf y mandamos los parametros
        $pdf = Pdf::loadView('pdf.requerimiento', ['items' => $datos, 'fechaNotiDeter' => $fechaNotiDeter, 'folio' => $folio, 't_adeudo_t' => $t_adeudo_t, 'tar' => $tar, 'ejecutores' => $ejecutoresformat,'total'=>$total_ar]);
        return $pdf->stream();
    }
}
