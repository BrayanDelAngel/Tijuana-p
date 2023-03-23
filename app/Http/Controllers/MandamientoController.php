<?php

namespace App\Http\Controllers;

use App\Models\determinacionesA;
use App\Models\ejecutores_ma;
use App\Models\mandamientosA;
use App\Models\requerimientosA;
use App\Models\tabla_da;
use App\Models\tabla_ma;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\DB;
use Luecano\NumeroALetras\NumeroALetras;

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
            $validar = requerimientosA::join('determinacionesA as d', 'requerimientosA.id_d', '=', 'd.id')
                ->where('d.cuenta', $cuenta)
                ->count();
            //si no tiene un requerimiento mandar un error y redireccionarlo a index
            if (($validar) == 0) {
                return  redirect()->action(
                    [IndexController::class, 'index']
                )->with('accessDeniedMandamiento', 'error');
            }
            //en caso que ya tiene un requerimiento puede pasar a las operaciones previas
            else {
                //consultamos los datos del form
                $date = determinacionesA::join('requerimientosA as r', 'determinacionesA.id', '=', 'r.id_d')
                    ->select(
                        [
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
                            'periodo',
                            'multas',
                            'gastos_ejecucion',
                            'conv_vencido',
                            'otros_gastos',
                            'saldo_total as total',
                        ]
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
                //validamos el tipo de servicio
                if ($date[0]->TipoServicio == "R" || $date[0]->TipoServicio == "RESIDENCIAL") {
                    $ts = 'DOMESTICO';
                } else {
                    $ts = 'NO DOMESTICO';
                }
                //mandamos a llamar al stored procedure
                $exec = DB::select("exec calcula_tijuana_A ?,?,?", array($cuenta, $ts, 'mandamiento'));
                //Obtenemos los datos de la tabla adeudo
                $t_adeudo_t = tabla_ma::select(['totalPeriodo', 'RecargosAcumulados', DB::raw("(RecargosAcumulados+totalPeriodo) as total")])
                    ->where('cuenta', $cuenta)->orderBy('meses', 'ASC')->first();
                //convertiremos el total del adeudo requerido en letras
                $formatter = new NumeroALetras();
                //obtenemos el total del adeuto requerido
                $total_ar = $t_adeudo_t->totalPeriodo + $t_adeudo_t->RecargosAcumulados + $date[0]->multas + $date[0]->gastos_ejecucion + $date[0]->conv_vencido + $date[0]->otros_gastos;
                //extraemos el entero
                $entero = floor($total_ar);
                //extraemos el decimal
                $decimal = round($total_ar - $entero, 2) * 100;
                //convertimos en texto el entero
                $texto_entero = $formatter->toMoney($entero);
                //concatenamos para obtener todo el texto
                $tar = ' (' . $texto_entero . ' ' . $decimal . '/100 Moneda Nacional)';
                return view('components.formMandamiento', ['date' => $date, 'folio' => $folio, 't_adeudo_t' => $t_adeudo_t, 'tar' => $tar, 'total_ar' => number_format($total_ar, 2)]);
            }
        }
    }
    public function store(Request $request)
    {   
        //Validacion del request
        $request->validate([
            'fecham' =>  ['required'],
            'notificacion' =>  ['required'],
            'sobrerecaudador' =>  ['required'],
        ]);

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
                //Si el ejecutor es nulo se le agrega a la tabla none 
                if ($request->ejecutor[$i] == null) {
                    $e->ejecutor = 'none';
                }
                //Si no se agrega el ejecutor recibido 
                else {
                    $e->ejecutor = $request->ejecutor[$i];
                }
                $e->id_m = $id[0]->id;
                $e->save();
            }
            //si se guardaron los datos retornamos el pdf
            if ($e->save()) {

                return '<script type="text/javascript">window.open("PDFMandamiento/' . $id[0]->id . '")</script>' .
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
        $datos = determinacionesA::join('requerimientosA as r', 'determinacionesA.id', '=', 'r.id_d')
            ->join('mandamientosA as m', 'r.id', '=', 'm.id_r')
            ->select(
                'propietario',
                'domicilio',
                'folio',
                'cuenta',
                'clavec',
                'seriem',
                'multas',
                'gastos_ejecucion',
                'conv_vencido',
                'otros_gastos',
                'periodo',
                'saldo_total as total',
                'm.sobrerecaudador as sobrerecaudador',
                'r.tipo_s',
                'fecham as fecha_converter',
                'fechand as fecha_converternd',
                DB::raw("format(fechad,'dd'' de ''MMMM'' de ''yyyy','es-es') as fechad"),
                DB::raw("format(fecham,'dd'' de ''MMMM'' de ''yyyy','es-es') as fecham"),
                DB::raw("format(fechanr,'dd'' de ''MMMM'' de ''yyyy','es-es') as fechanr"),
                DB::raw("format(fechand,'dd'' del mes de ''MMMM','es-es') as fechand2"),
                DB::raw("format(fecham,'dd'' del mes de ''MMMM','es-es') as fecham2")
            )
            ->where('m.id', $id)
            ->get();
            //Obteniendo el sobrerecaudador
            $sobrerecaudador=$datos[0]->sobrerecaudador;
        $formato = new NumeroALetras();
        //Convirtiendo la fecha en fecha corta para mandamiento
        $f = strtotime($datos[0]->fecha_converter);
        $anio = date("Y", $f);
        //Convirtiendo la fecha en fecha corta para determinacion
        $fnd = strtotime($datos[0]->fecha_converternd);
        $aniond = date("Y", $fnd);
        //Convirtiendo el año en letra ejemplo 2020 en dos mil veite
        $conversion = $formato->toString($anio);
        //Convirtiendo el año en letra ejemplo 2020 para determinacion
        $conversion2 = $formato->toString($aniond);
        //Concatenando la fecha
        $fechamanda = $datos[0]->fecham2 . ' del ' . mb_strtolower(substr($conversion, 0, -1), "UTF-8");
        $fechadeterminacion = $datos[0]->fechand2 . ' del ' . mb_strtolower(substr($conversion2, 0, -1), "UTF-8");
        $multas = $datos[0]->multas;
        $gastos_ejecucion = $datos[0]->gastos_ejecucion;
        $conv_vencido = $datos[0]->conv_vencido;
        $otros_gastos = $datos[0]->otros_gastos;
        //Informacion de la tabla generada del propietario
        $tabla = tabla_ma::select(['meses', 'periodo', 'fechaVencimiento', 'lecturaFacturada', 'tarifa1', 'sumaTarifas', 'tarifa2', 'factor', 'saldoAtraso', 'saldoRezago', 'totalPeriodo', 'importeMensual', 'RecargosAcumulados'])
            ->where('cuenta', $datos[0]->cuenta)->orderBy('meses', 'ASC')->get();
        //consultamos los totales de la tabla de adeudo
        $totales = DB::table('tabla_ma')
            ->select([DB::raw("sum(totalPeriodo) as TP"), DB::raw("sum(RecargosAcumulados) as RA"), DB::raw("sum(RecargosAcumulados+totalPeriodo) as total")])
            ->where('cuenta', $datos[0]->cuenta)
            ->get();
        //consultamos los datos para la tbla del total del adeudo requerido
        $t_adeudo_t = tabla_ma::select(['totalPeriodo', 'RecargosAcumulados'])
            ->where('cuenta', $datos[0]->cuenta)->orderBy('meses', 'ASC')->first();
        //agregamos los ceros correspondientes al oficio
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
        $total_ar = $t_adeudo_t->totalPeriodo + $t_adeudo_t->RecargosAcumulados + $datos[0]->multas + $datos[0]->gastos_ejecucion + $datos[0]->conv_vencido + $datos[0]->otros_gastos;
        //extraemos el entero
        $entero = floor($total_ar);
        //extraemos el decimal
        $decimal = round($total_ar - $entero, 2) * 100;
        //convertimos en texto el entero
        $texto_entero = $formatter->toMoney($entero);
        //concatenamos para obtener todo el texto
        $tar = ' (' . $texto_entero . ' ' . $decimal . '/100 Moneda Nacional)';
        //Obtenemos los ejecutores
        $ejecutores = mandamientosA::join('ejecutores_ma as e', 'e.id_m', '=', 'mandamientosA.id')->select('ejecutor')->where('id', $id)->get();
        //Conteo del total de ejecutores
        $count_ejecutor = mandamientosA::join('ejecutores_ma as e', 'e.id_m', '=', 'mandamientosA.id')->select('ejecutor')->where('id', $id)->count();
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
        $pdf = Pdf::loadView('pdf.mandamiento', [
            'tabla' => $tabla,
            'items' => $datos, 
            'folio' => $folio,
            't_adeudo_t' => $t_adeudo_t,
            'totales' => $totales,
            't_adeudor' => $t_adeudo_t,
            'tar' => $tar, 
            'ejecutores' => $ejecutoresformat,
            'multas' => $multas,
            'gastos_ejecucion' => $gastos_ejecucion,
            'conv_vencido' => $conv_vencido,
            'otros_gastos' => $otros_gastos,
            'total_ar' => number_format($total_ar, 2),
            'fechamanda'=>$fechamanda,
            'fechadeterminacion'=>$fechadeterminacion,
            'sobrerecaudador'=>$sobrerecaudador,
        ]);
        // setPaper('')->
        //A4 -> carta
        return $pdf->stream();
    }
}
