<?php

namespace App\Http\Controllers;

use App\Models\determinacionesA;
use App\Models\ejecutores_ma;
use App\Models\mandamientosA;
use App\Models\requerimientosA;
use App\Models\tabla_ma;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Luecano\NumeroALetras\NumeroALetras;
use App\Http\Requests\TablaModalRequest;

class MandamientoController extends Controller
{
    public function exec($cuenta)
    {
        // webServiceCobranzaExterna($cuenta);
        //validamos si existe en la tabla de cobranza historicos
        $existe = DB::select('select count(NoCta)as c from cobranzaExternaHistoricosWS3 where NoCta = ?', [$cuenta]);
        //si no existe mandar un error y redireccionarlo al index
        if (($existe[0]->c) == 0) {
            return redirect()->action(
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
                return redirect()->action(
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
                            'gastos_ejecución',
                            'conv_vencido',
                            'otros_gastos',
                            'saldo_total as total',
                        ]
                    )
                    ->where('determinacionesA.cuenta', $cuenta)
                    ->get();

                //validamos el tipo de servicio
                if ($date[0]->TipoServicio == "R" || $date[0]->TipoServicio == "RESIDENCIAL") {
                    $ts = 'DOMESTICO';
                } else {
                    $ts = 'NO DOMESTICO';
                }
                //mandamos a llamar al stored procedure
                $exec = DB::select("exec calcula_tijuana_A ?,?,?", array($cuenta, $ts, 'mandamiento'));
                //si se ejecuta el procedimiento mandamos a llamar a la funcion index
                if ($exec) {
                    return redirect()->action(
                        [MandamientoController::class, 'index'],
                        ['cuenta' => $cuenta]
                    );
                }
            }
        }
    }
    public function index($cuenta)
    {
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
                    'gastos_ejecución',
                    'conv_vencido',
                    'otros_gastos',
                    'saldo_total as total',
                    'r.ejecutores',
                    'r.nombramiento',
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
        //Informacion de la tabla generada del propietario
        $tabla = tabla_ma::select(['meses', 'periodo', 'fechaVencimiento', 'lecturaFacturada', 'tarifa1', 'sumaTarifas', 'tarifa2', 'factor', 'saldoAtraso', 'saldoRezago', 'totalPeriodo', 'importeMensual', 'RecargosAcumulados', 'fecha_vto','cuenta'])
            ->where('cuenta', $cuenta)->where('estado', 0)->orderBy('meses', 'ASC')->paginate(20);
        return view('components.formMandamiento', ['date' => $date, 'folio' => $folio, 't_adeudo_t' => $t_adeudo_t, 'tar' => $tar, 'total_ar' => number_format($total_ar, 2),'items' => $tabla]);

    }
    public function store(Request $request)
    {
        //Validacion del request
        $request->validate([
            'fecham' => ['required'],
            'notificacion' => ['required'],
            'sobrerecaudador' => ['required'],
            'ejecutores' =>  ['required'],
            'nombramiento' =>  ['required'],
            /*'pagor' => ['required'],
            'totalr' => ['required'],
            'pagoe' => ['required'],
            'totale' => ['required'],*/
        ]);
        
        //validar si esta cuenta ya tiene un mandamiento
        $count_r = DB::select('select count(id) as c from mandamientosA where id_r = ?', [$request->id]);
        //si existe 
        if (($count_r[0]->c) != 0) {
            //consultar el id del mandamiento
            $id = DB::select('select id from mandamientosA where id_r = ?', [$request->id]);
            //eliminamos los ejecutores existentes
           // $deleted = DB::delete('delete ejecutores_ma where id_m = ?', [$id[0]->id]);
            //declaramos que se va a modificar el registro de requerimiento
            $r = mandamientosA::findOrFail($id[0]->id);
        }
        //no existe
        else {

            //declaramos que se creara un nuevo registro en mandamientosA
            $r = new mandamientosA();
        }
       /* $pagor = (float) str_replace(array('$', ','), '', $request->pagor);
        $totalr = (float) str_replace(array('$', ','), '', $request->totalr);
        $pagoe = (float) str_replace(array('$', ','), '', $request->pagoe);
        $totale = (float) str_replace(array('$', ','), '', $request->totale);*/
        //guardamos los datos en requerimientosA
        $r->fecham = $request->fecham;
        $r->fechanr = $request->notificacion;
        $r->sobrerecaudador = $request->sobrerecaudador;
        $r->id_r = $request->id;
        $r->ejecutores = $request->ejecutores;
        $r->nombramiento = $request->nombramiento;
        
       /* $r->pago_requerimiento = $pagor;
        $r->total_requerimiento = $totalr;
        $r->pago_embargo = $pagoe;
        $r->total_embargo = $totale;*/
        $r->save();

        //validamos si se guardaron los datos
        if ($r->save()) {
            //consultamos su id
            $id = DB::select('select id from mandamientosA where id_r = ?', [$request->id]);
           // dd(count($request->ejecutor)); //recorremos el array de los ejecutores
            //for ($i = 0; $i < count($request->ejecutor); $i++) {
                //declaramos que se hara un nuevo registro en ejecutores_ra
                $e = new ejecutores_ma();
                //Si el ejecutor es nulo se le agrega a la tabla none
                if ($request->ejecutor == null) {
                    $e->ejecutor = 'none';
                }
                //Si no se agrega el ejecutor recibido
                else {
                    $e->ejecutor = $request->ejecutor;
                }
                $e->id_m = $id[0]->id;
                $e->save();
            //}
            //si se guardaron los datos retornamos el pdf
            if ($e->save()) {

                return '<script type="text/javascript">window.open("PDFMandamiento/' . $id[0]->id . '")</script>' .
                redirect()->action(
                    [IndexController::class, 'index']
                );
            } else {
                return back()->with('errorPeticion', 'Error al generar');
            }
        } else {
            return back()->with('errorPeticion', 'Error al generar');
        }
    }
    public function update(TablaModalRequest $request)
    {
        $data = $request->validated();
        $actualizado=DB::update('
        UPDATE [dbo].[tabla_ma]
        SET [lecturaFacturada] = ?
      ,[periodo] = ?
      ,[fechaVencimiento] = ?
      ,[tarifa1] = ?
      ,[sumaTarifas] = ?
      ,[factor] = ?
      ,[saldoAtraso] = ?
      ,[saldoRezago] = ?
      ,[totalPeriodo] = ?
      ,[importeMensual] = ?
      ,[RecargosAcumulados] = ?
      ,[fecha_vto] = ?
        WHERE cuenta = ? and meses = ?
        ', [
            $request->lecturaFacturadaT,
            $request->periodoT,
            convertDate($request->fecha_vtoT),
            floatval($request->tarifa1T),
            $request->sumaTarifasT,
            floatval($request->factorT),
            floatval($request->saldoAtrasoT),
            floatval($request->saldoRezagoT),
            floatval($request->totalPeriodoT),
            floatval($request->importeMensualT),
            floatval($request->RecargosAcumuladosT),
            $request->fecha_vtoT,
            $request->cuentaT,
            $request->mesesT,
        ]);
        if($actualizado){
            return back()->with('actualizado', 'Se actualizaron los datos correctamente');
        }
        else{
            return back()->with('errorActualizarTabla', 'Error al actualizar los datos');
        }
    }
    public function delete ($cuenta, $meses ){
        DB::delete('update [dbo].[tabla_ma]
        SET [estado]=1 where cuenta = ? and meses=?', [$cuenta, $meses]);
        return back();
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
                'gastos_ejecución',
                'conv_vencido',
                'otros_gastos',
                'periodo',
                'm.pago_requerimiento as pagor',
                'm.total_requerimiento as totalr',
                'm.pago_embargo as pagoe',
                'm.total_embargo as totale',
                'saldo_total as total',
                'm.sobrerecaudador as sobrerecaudador',
                'r.tipo_s',
                'fecham as fecha_converter',
                'fechand as fecha_converternd',
                'r.ejecutores',
                'r.nombramiento',
                DB::raw("format(fechad,'dd'' de ''MMMM'' de ''yyyy','es-es') as fechad"),
                DB::raw("format(fechar,'dd'' de ''MMMM'' de ''yyyy','es-es') as fechar"),
                DB::raw("format(fecham,'dd'' dias del mes de ''MMMM'' del año ''yyyy','es-es') as fecham"),
                DB::raw("format(fechanr,'dd'' de ''MMMM'' de ''yyyy','es-es') as fechanr"),
                DB::raw("format(fechand,'dd'' del mes de ''MMMM'' del ''yyyy','es-es') as fechand2"),
                DB::raw("format(fecham,'dd'' dias del mes de ''MMMM','es-es') as fecham2")
            )
            ->where('m.id', $id)
            ->get();
        
        //Obteniendo datos que no se pueden visualizar en el pdf por medio del foreach
        $sobrerecaudador = $datos[0]->sobrerecaudador;
        $pagor = $datos[0]->pagor;
        $totalr = $datos[0]->totalr;
        $pagoe = $datos[0]->pagoe;
        $totale = $datos[0]->totale;
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
        $fecharequi = $datos[0]->fechar;
        $fechanr = $datos[0]->fechanr;
        // $fechadeterminacion = $datos[0]->fechand2 . ' del ' . mb_strtolower(substr($conversion2, 0, -1), "UTF-8");
        $fechadeterminacion = $datos[0]->fechand2 ;
        $multas = $datos[0]->multas;
        $gastos_ejecucion = $datos[0]->gastos_ejecución;
        $conv_vencido = $datos[0]->conv_vencido;
        $otros_gastos = $datos[0]->otros_gastos;
        //Informacion de la tabla generada del propietario
        $tabla = tabla_ma::select(['meses', 'periodo', 'fechaVencimiento', 'lecturaFacturada', 'tarifa1', 'sumaTarifas', 'tarifa2', 'factor', 'saldoAtraso', 'saldoRezago', 'totalPeriodo', 'importeMensual', 'RecargosAcumulados', 'fecha_vto'])
            ->where('cuenta', $datos[0]->cuenta)->where('estado', 0)->orderBy('meses', 'ASC')->get();
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
        
         //Contador de meses
         $i=0;
         $cr = tabla_ma::select('cuenta')->where('cuenta', $datos[0]->cuenta)->count();
        // $condicion_firma=firmaMandamiento($cr);
        //si esta bien 
        // if($condicion_firma!=1){
            $pdf = Pdf::loadView('pdf.mandamiento', [
                'tabla' => $tabla,
                'items' => $datos,
                'folio' => $folio,
                't_adeudo_t' => $t_adeudo_t,
                'totales' => $totales,
                't_adeudor' => $t_adeudo_t,
                'tar' => $tar,
                'multas' => $multas,
                'gastos_ejecucion' => $gastos_ejecucion,
                'conv_vencido' => $conv_vencido,
                'otros_gastos' => $otros_gastos,
                'total_ar' => number_format($total_ar, 2),
                'fechamanda' => $fechamanda,
                'fecharequi' => $fecharequi,
                'fechanr' => $fechanr,
                'fechadeterminacion' => $fechadeterminacion,
                'sobrerecaudador' => $sobrerecaudador,
                'pagor' => $pagor,
                'totalr' => $totalr,
                'pagoe' => $pagoe,
                'totale' => $totale,
                'i'=>$i,
                
            ]);
            
        // }
        //Si no 
        // else{
        //     $pdf = Pdf::loadView('pdf.mandamiento_firma', [
        //         'tabla' => $tabla,
        //         'items' => $datos,
        //         'folio' => $folio,
        //         't_adeudo_t' => $t_adeudo_t,
        //         'totales' => $totales,
        //         't_adeudor' => $t_adeudo_t,
        //         'tar' => $tar,
        //         'ejecutores' => $ejecutoresformat,
        //         'multas' => $multas,
        //         'gastos_ejecucion' => $gastos_ejecucion,
        //         'conv_vencido' => $conv_vencido,
        //         'otros_gastos' => $otros_gastos,
        //         'total_ar' => number_format($total_ar, 2),
        //         'fechamanda' => $fechamanda,
        //         'fechadeterminacion' => $fechadeterminacion,
        //         'sobrerecaudador' => $sobrerecaudador,
        //         'pagor' => $pagor,
        //         'totalr' => $totalr,
        //         'pagoe' => $pagoe,
        //         'totale' => $totale,
        //         'i'=>$i,
        //     ]);
        // }
        // setPaper('')->
        //A4 -> carta
        return $pdf->stream();
    }
}
