<?php

namespace App\Http\Controllers;

use App\Models\determinacionesA;
use App\Models\ejecutores_ra;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Svg\Tag\Rect;
use Illuminate\Support\Facades\DB;
use App\Models\implementta;
use App\Models\requerimientosA;
use App\Models\tabla_da;
use NumberFormatter;

class DeterminacionController extends Controller
{
    public function exec($cuenta){
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
        if ($date[0]->TipoServicio=="R"||$date[0]->TipoServicio=="RESIDENCIAL") {
            $ts='DOMESTICO';
        }
        else {
            $ts='NO DOMESTICO';
        }
        //mandamos a llamar al stored procedure
        $exec=DB::select("exec calcula_tijuana_A ?,?",array($cuenta,$ts));
        //si se ejecuta el procedimiento mandamos a llamar a la funcion index
        if($exec){
            return redirect()->action(
                     [DeterminacionController::class, 'index'], ['cuenta' => $cuenta]
                 ); 
        }
        }
    }

    public function index($cuenta)
    {
            //consultamos los datos ya tenidos del propietario
            $date = implementta::select('Cuenta', 'Clave', 'Propietario', 'TipoServicio', 'SerieMedidor', DB::raw("Concat(Calle,' ',NumExt,' ',NumInt,' ',Colonia) as Domicilio"))
                ->where('implementta.Cuenta', $cuenta)
                ->get();
                
            //validamos el tipo de servicio
            if ($date[0]->TipoServicio=="R"||$date[0]->TipoServicio=="RESIDENCIAL") {
                $ts='DOMESTICO';
            }
            else {
                $ts='NO DOMESTICO';
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
            $adeudo = DB::select('select sum(saldoCorriente) as sumaCorriente, sum(saldoIvaCor) as sumaIVA, sum(saldoAtraso) as sumaAtraso, sum(saldoRezago) as sumaRezago, sum(recargosAcum) as sumaRecargoAcomulado, sum(ivaReacum) as IVARezagoAcomulado from cobranzaExternaHistoricosWS3 where NoCta = ?', [$cuenta]);
            //obtenemos el periodo en el    ue se esta evaluando
            //se cincatena la fecha maxima y minima 
            $periodo = DB::select("select concat((select format(min(fechaLecturaActual),'dd'' de ''MMMM'' de ''yyyy','es-es')), ' al ' ,(select format(max(fechaLecturaActual),'dd'' de ''MMMM'' de ''yyyy','es-es'))) as periodo from cobranzaExternaHistoricosWS3 where cuentaImplementta=?", [$cuenta]);
            return view('components.formDeterminacion', ['date' => $date, 'folio' => $folio,'periodo'=>$periodo,'ts'=>$ts]);
    }
    public function store(Request $request)
    {
        //validamos los campos
        $request->validate([
            'folio' => ['required'],
            'propietario' =>  ['required'],
            'seriem' => ['required'],
            'fechad' => ['required'],
            'domicilio' =>  ['required'],
            'razons' =>  ['required'],
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
            dd("error");
        }
    }
    public function pdf($id)
    {
        //Informacion del propietario
        $data=determinacionesA::select('cuenta','folio','fechad','domicilio','clavec','tipo_s','seriem','razons','periodo','propietario')->where('id',$id)->first();
        //Informacion de la tabla generada del propietario
        $tabla=tabla_da::select(['meses','periodo','fechaVencimiento','lecturaFacturada','tarifa1','sumaTarifas','tarifa2','factor','saldoAtraso','saldoRezago','totalPeriodo','importeMensual','RecargosAcumulados'])
        ->where('cuenta',$data->cuenta)->orderBy('meses','ASC')->get();
        //Se extrae los a??os que debe el propietario
        $a??os=tabla_da::select('anio')
        ->where('cuenta',$data->cuenta)->orderBy('anio','ASC')->groupBy('anio')->get();
        //Se hace el conteo de los a??os totales
        $countA??os=tabla_da::select('anio')->distinct('anio')->where('cuenta',$data->cuenta)->count();
        //Variable acomuladora
        $anioformat='';
        //Se he un recorrido
        for ($i=0; $i < $countA??os; $i++) { 
            //si el ultimo dato 
            if($i==($countA??os-1)){
                // en el amcomulador se le agrega un Y
                $anioformat=$anioformat.' y '.$a??os[$i]->anio;
            }
            else if($i==($countA??os-2)){
                // si es el penultimo no se le agrega el ','
                $anioformat=$anioformat.$a??os[$i]->anio.'';
            }
            else{
                // si no re acomulan los a??os y se les agrega las ','
                $anioformat=$anioformat.$a??os[$i]->anio.',';
            }
        }
        $pdf = Pdf::loadView('pdf.determinacion',['items'=>$tabla,'data'=>$data,'anioformat'=>$anioformat]);
        // setPaper('')->
        //A4 -> carta
        return $pdf->stream();
    }
}
