<?php

namespace App\Http\Controllers;

use App\Models\determinacionesA;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\implementta;
use App\Models\tabla_da;
use Luecano\NumeroALetras\NumeroALetras;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Support\Facades\Http;

class DeterminacionController extends Controller
{
    public function exec($cuenta)
    {
        webServiceCobranzaExterna($cuenta);
        // dd(webServiceCobranzaExterna($cuenta));
        //validamos si la cuenta existe dentro de la tabla cobranza
        $existe = DB::select('select count(NoCta)as c from cobranzaExternaHistoricosWS3 where NoCta = ?', [$cuenta]);
        //si no existe mandamos un error
        if (($existe[0]->c) == 0) {
            return  redirect()->action(
                [IndexController::class, 'index']
            )->with('error', 'error');
        }
        //si existe
        else {

            $date = implementta::select('TipoServicio')
                ->where('implementta.Cuenta', $cuenta)
                ->get();

            //validamos el tipo de servicio
            if ($date[0]->TipoServicio == "R" || $date[0]->TipoServicio == "RESIDENCIAL") {
                $ts = 'DOMESTICO';
            } else {
                $ts = 'NO DOMESTICO';
            }
            //mandamos a llamar al stored procedure
            $exec = DB::select("exec calcula_tijuana_A ?,?,?", array($cuenta, $ts, 'determinacion'));
            //si se ejecuta el procedimiento mandamos a llamar a la funcion index
            if ($exec) {
                return redirect()->action(
                    [DeterminacionController::class, 'index'],
                    ['cuenta' => $cuenta]
                );
            }
        }
    }

    public function index($cuenta)
    {
        //consultamos los datos ya tenidos del propietario
        $date = implementta::select('Cuenta', 'Clave', 'Propietario', 'TipoServicio', 'SerieMedidor', 'Giro', DB::raw("Concat(Calle,' ',NumExt,' ',NumInt,' ',Colonia) as Domicilio"))
            ->where('implementta.Cuenta', $cuenta)
            ->get();
        $giro = '';
        if ($date[0]->Giro != 'NULL' || $date[0]->Giro != '' || $date[0]->Giro != null) {
            $giro = $date[0]->Giro;
        }
        $folios = determinacionesA::select(['folio', 'cuenta'])->orderBy('folio', 'DESC')->paginate();
        //validamos el tipo de servicio
        if ($date[0]->TipoServicio == "R" || $date[0]->TipoServicio == "RESIDENCIAL") {
            $ts = 'DOMESTICO';
        } else {
            $ts = 'NO DOMESTICO';
        }

        //validar si esta cuenta ya tiene una determinacion
        $count_r = DB::select('select count(id) as c from determinacionesA where cuenta = ?', [$cuenta]);
        //si existe
        if (($count_r[0]->c) != 0) {
            $folio_c = DB::select('select folio from determinacionesA where cuenta = ?', [$cuenta]);
            $folio = $folio_c[0]->folio;
        } else {
            $folio = 0;
        }

        //obtenemos los datos de la tabla de resumen
        $t_adeudo = tabla_da::select(['sumaTarifas', 'saldoIvaCor', 'saldoAtraso', 'saldoRezago', 'RecargosAcumulados'])
            ->where('cuenta', $cuenta)->orderBy('meses', 'ASC')->first();
        //obtenemos el periodo en el    ue se esta evaluando
        //se cincatena la fecha maxima y minima 
        $periodo = DB::select("select concat((select format(min(fechaLecturaActual),'dd'' de ''MMMM'' de ''yyyy','es-es')), ' al ' ,(select format(max(fechaLecturaActual),'dd'' de ''MMMM'' de ''yyyy','es-es'))) as periodo from cobranzaExternaHistoricosWS3 where cuentaImplementta=?", [$cuenta]);
        return view('components.formDeterminacion', ['date' => $date, 'folio' => $folio, 'periodo' => $periodo, 'ts' => $ts, 't_adeudo' => $t_adeudo, 'folios' => $folios, 'giro' => $giro]);
    }
    public function store(Request $request)
    {

        $request->validate([
            'folio' => ['required'],
            'propietario' =>  ['required'],
            'seriem' => ['required'],
            'fechad' => ['required'],
            'domicilio' =>  ['required'],
            'corriente' =>  ['required'],
            'icorriente' =>  ['required'],
            'atraso' =>  ['required'],
            'rezago' =>  ['required'],
            'r_consumo' =>  ['required'],
            'c_agua' =>  ['required'],
            'r_agua' =>  ['required'],
            'c_obra' =>  ['required'],
            'r_obra' =>  ['required'],
            'g_ejecucion' =>  ['required'],
            'o_servicios' =>  ['required'],
            'multas' =>  ['required'],
            'gastos_ejecucion' =>  ['required'],
            'conv_vencido' =>  ['required'],
            'otros_gastos' =>  ['required'],
            'total' =>  ['required'],
        ]);
        //validar si esta cuenta ya tiene una determinacion
        $count_d = DB::select('select count(id) as c from determinacionesA where cuenta = ?', [$request->cuenta]);
        //si existe
        if (($count_d[0]->c) != 0) {
            //consultar el id de la determinacion
            $id = DB::select('select id from determinacionesA where cuenta = ?', [$request->cuenta]);
            //declaramos que se va a modificar el registro de la determinacion
            $r = determinacionesA::findOrFail($id[0]->id);
            //validamos que si el oficio es diferente al que inserto que sea unico
            //consultamos su oficio
            $folio = DB::select('select folio from determinacionesA where cuenta = ?', [$request->cuenta]);
            if ($folio[0]->folio != $request->folio) {
                $request->validate([
                    'folio' =>  ['unique:determinacionesA'],
                ]);
            }
        }
        //no existe
        else {
            $request->validate([
                'folio' =>  ['unique:determinacionesA'],
            ]);
            //declaramos que se creara un nuevo registro en requerimientosA
            $r = new determinacionesA();
        }
        //Remplazar $ por ''
        $corriente = (float) str_replace(array('$', ','), '', $request->corriente);
        $icorriente = (float) str_replace(array('$', ','), '', $request->icorriente);
        $atraso = (float) str_replace(array('$', ','), '', $request->atraso);
        $rezago = (float) str_replace(array('$', ','), '', $request->rezago);
        $r_consumo = (float) str_replace(array('$', ','), '', $request->r_consumo);
        $c_agua = (float) str_replace(array('$', ','), '', $request->c_agua);
        $r_agua = (float) str_replace(array('$', ','), '', $request->r_agua);
        $c_obra = (float) str_replace(array('$', ','), '', $request->c_obra);
        $r_obra = (float) str_replace(array('$', ','), '', $request->r_obra);
        $g_ejecucion = (float) str_replace(array('$', ','), '', $request->g_ejecucion);
        $o_servicios = (float) str_replace(array('$', ','), '', $request->o_servicios);
        $multas = (float) str_replace(array('$', ','), '', $request->multas);
        $gastos_ejecucion = (float) str_replace(array('$', ','), '', $request->gastos_ejecucion);
        $conv_vencido = (float) str_replace(array('$', ','), '', $request->conv_vencido);
        $otros_gastos = (float) str_replace(array('$', ','), '', $request->otros_gastos);
        $total = (float) str_replace(array('$', ','), '', $request->total);
        //guardamos los datos en requerimientosA
        $r->folio = $request->folio;
        $r->fechad = $request->fechad;
        $r->cuenta = $request->cuenta;
        $r->propietario = $request->propietario;
        $r->domicilio = $request->domicilio;
        $r->clavec = $request->clavec;
        $r->tipo_s = $request->tipo_s;
        $r->seriem = $request->seriem;
        $r->razons = $request->razons;
        $r->periodo = $request->periodo;
        $r->corriente = $corriente;
        $r->iva_corriente = $icorriente;
        $r->atraso = $atraso;
        $r->rezago = $rezago;
        $r->recargos_consumo = $r_consumo;
        $r->convenio_agua = $c_agua;
        $r->recargos_convenio_agua = $r_agua;
        $r->convenio_obra = $c_obra;
        $r->recargos_convenio_obra = $r_obra;
        $r->gastos_ejecución = $g_ejecucion;
        $r->otros_servicios = $o_servicios;
        $r->multas = $multas;
        $r->gastos_ejecucion = $gastos_ejecucion;
        $r->conv_vencido = $conv_vencido;
        $r->otros_gastos = $otros_gastos;
        $r->saldo_total = $total;
        $r->save();
        //validamos si se guardaron los datos
        if ($r->save()) {

            //consultamos el id de la determinacion en base a la cuenta
            $id = DB::select('select id from determinacionesA where cuenta = ?', [$request->cuenta]);
            //retirnamos al pdf y le pasamos la cuenta
            return '<script type="text/javascript">window.open("PDFDeterminacion/' . $id[0]->id . '")</script>' .
                redirect()->action(
                    [IndexController::class, 'index']
                );
        } else {
            return back()->with('errorPeticion', 'Error al generar');
        }
    }
    public function pdf($id)
    {
        //Informacion del propietario
        $data = determinacionesA::select(
            'cuenta',
            'folio',
            DB::raw("format(fechad,'dd'' de ''MMMM'' de ''yyyy','es-es') as fechad"),
            'domicilio',
            'clavec',
            'tipo_s',
            'seriem',
            'razons',
            'periodo',
            'propietario',
            'corriente',
            'iva_corriente',
            'atraso',
            'rezago',
            'recargos_consumo',
            'convenio_agua',
            'recargos_convenio_agua',
            'convenio_obra',
            'recargos_convenio_obra',
            'gastos_ejecución',
            'otros_servicios',
            'saldo_total'
        )->where('id', $id)->first();
        $folio = $data->folio;
        $longitud = strlen($folio);
        if ($longitud <= 5) {
            while ($longitud < 5) {
                $folio = "0" . $folio;
                $longitud = strlen($folio);
            }
        }
        //Informacion de la tabla generada del propietario
        $tabla = tabla_da::select(['meses', 'periodo', 'fechaVencimiento', 'lecturaFacturada', 'tarifa1', 'sumaTarifas', 'tarifa2', 'factor', 'saldoAtraso', 'saldoRezago', 'totalPeriodo', 'importeMensual', 'RecargosAcumulados'])
            ->where('cuenta', $data->cuenta)->orderBy('meses', 'ASC')->get();
        // dd($tabla);
        //Se extrae los años que debe el propietario
        $años = tabla_da::select('anio')
            ->where('cuenta', $data->cuenta)->orderBy('anio', 'ASC')->groupBy('anio')->get();
        //Se hace el conteo de los años totales
        $countAños = tabla_da::select('anio')->distinct('anio')->where('cuenta', $data->cuenta)->count();
        //Variable acomuladora
        $anioformat = ''; //Esperar a que si los anos se quedan en estaticos o seran dinamicos NO ELIMINAR AUN
        //Se he un recorrido
        for ($i = 0; $i < $countAños; $i++) {
            //si el ultimo dato 
            if ($i == ($countAños - 1)) {
                // en el amcomulador se le agrega un Y
                $anioformat = $anioformat . ' y ' . $años[$i]->anio;
            } else if ($i == ($countAños - 2)) {
                // si es el penultimo no se le agrega el ','
                $anioformat = $anioformat . $años[$i]->anio . '';
            } else {
                // si no re acomulan los años y se les agrega las ','
                $anioformat = $anioformat . $años[$i]->anio . ',';
            }
        }
        $cuenta = determinacionesA::select('cuenta')
            ->where('id', $id)->first();
        //obtenemos los datos de la tabla de resumen
        $t_adeudo = tabla_da::select(['sumaTarifas', 'saldoIvaCor', 'saldoAtraso', 'saldoRezago', 'RecargosAcumulados', 'totalPeriodo'])
            ->where('cuenta', $cuenta->cuenta)->orderBy('meses', 'ASC')->first();
        $total_ar = $t_adeudo->totalPeriodo +
            $t_adeudo->RecargosAcumulados +
            $data->convenio_agua +
            $data->recargos_convenio_agua +
            $data->convenio_obra +
            $data->recargos_convenio_obra +
            $data->gastos_ejecución +
            $data->otros_gastos;
        // dd($total_ar);
        //convertiremos los recargos acumulados a texto
        $formatter = new NumeroALetras();
        //extraemos el entero
        $entero = floor($total_ar);
        //extraemos el decimal
        $decimal = round($total_ar - $entero, 2) * 100;
        //convertimos en texto el entero
        $texto_entero = $formatter->toMoney($entero);
        //concatenamos para obtener todo el texto
        $tar = ' (' . $texto_entero . ' ' . $decimal . '/100 Moneda Nacional)';
        //convertiremos el totalPeriodo a texto
        //extraemos el entero de los recargos
        $entero2 = floor($t_adeudo->totalPeriodo);
        //extraemos el decimal
        $decimal2 = round($t_adeudo->totalPeriodo - $entero2, 2) * 100;
        //convertimos en texto el entero
        $texto_entero2 = $formatter->toMoney($entero2);
        //concatenamos para obtener todo el texto
        $entero3 = floor($t_adeudo->RecargosAcumulados);
        //extraemos el decimal
        $decimal3 = round($t_adeudo->RecargosAcumulados - $entero3, 2) * 100;
        //convertimos en texto el entero
        $texto_entero3 = $formatter->toMoney($entero3);
        //concatenamos para obtener todo el texto
        $ra = '$' . number_format($t_adeudo->RecargosAcumulados, 2) . '**(' . $texto_entero3 . ' ' . $decimal3 . '/100 M.N.)**';
        $tp = '$' . number_format($t_adeudo->totalPeriodo, 2) . '**(' . $texto_entero2 . ' ' . $decimal2 . '/100 M.N.)**';
        $pdf = Pdf::loadView('pdf.determinacion', ['items' => $tabla, 'cuenta' => $cuenta->cuenta, 'ra' => $ra, 't_adeudo' => $t_adeudo, 'total_ar' => $total_ar, 'tar' => $tar, 'data' => $data, 'tp' => $tp, 'folio' => $folio, 'años' => $años, 'anioformat' => $anioformat]);
        // setPaper('')->
        //A4 -> carta
        return $pdf->stream();
    }
}
