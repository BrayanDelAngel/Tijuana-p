<?php

namespace App\Http\Controllers;

use App\Models\determinacionesA;
use App\Models\implementta;
use App\Models\requerimientosA;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
    //     $cuentas=array(
    //         '7666225',
    //     );
    //   $total=  count($cuentas);
    //     for ($i=0; $i <$total ; $i++) { 
    //       $id_distrito=  webServiceDistrito($cuentas[$i]);
    //       DB::update('update [dbo].[determinacionesA] SET id_distrito = ? where cuenta= ?', [$id_distrito,remove($cuentas[$i])]);
    //       DB::update('update [dbo].[cobranzaExternaHistoricosWS3] SET id_distrito = ? where NoCta= ?', [$id_distrito,remove($cuentas[$i])]);
    //     }
        //Retornando a la vista de inicio
        return view('components.inicio');
    }
    public function show(Request $request)
    {
        //Se optiene el valor 
        $data = $request->search;
        //Se busca la cuenta en base  la cuenta
        $cuenta='';
        $propietario='';
        $count = implementta::
            where('Cuenta', 'like', $data)
            ->count();
            if($count==0){
                $cuenta='none';
                $propietario='none';
            }else{
                $result = implementta::
                    select('Cuenta as Clave', 'Propietario as p')
                    ->where('Cuenta', 'like', $data)
                    ->get();
                 $cuenta=$result[0]->Clave;
                 $propietario=$result[0]->p;
                 $propietario=str_replace('¥','Ñ',$propietario);
            }
        //Retorna los datos de la consulta
        return back()
        ->with('result','Resultado')
        ->with('cuenta',$cuenta)
        ->with('propietario',$propietario);
    }
    public function pdf($cuenta)
    {
        //consultamos si ya tiene una determinacion
        $determinacion = determinacionesA::select('id')->where('cuenta', $cuenta)->count();
        //Si la determinacion es igual a nulo
        if ($determinacion == 0) {
            return back()->with('error_empty', 'No hay pdfs generados');
        } else {
            //consultamos el id de la determinacion
            $determinacion = determinacionesA::select('id')->where('cuenta', $cuenta)->first();
            //Se consulta si hay requerimiento en base  la cuenta ingrsada
            $requerimiento = requerimientosA::join('determinacionesA as d', 'd.id', '=', 'requerimientosA.id_d')
                ->select('requerimientosA.id as id')->where('cuenta', $cuenta)->first();
            //Si el requerimiento no arroga un resultado obtiene un valor 0
            if (!$requerimiento) {
                $r = 0;
            }
            //Si no obtendra el valor de la consulta
            else {
                $r = $requerimiento->id;
            }
            //Se consulta el mandamiento
            $mandamiento = determinacionesA::join('requerimientosA as r', 'determinacionesA.id', '=', 'r.id_d')
                ->join('mandamientosA as m', 'r.id', '=', 'm.id_r')
                ->select('m.id as id')->where('cuenta', $cuenta)->first();
            //Si no hay un mandamiento existente da un valor de 0
            if (!$mandamiento) {
                $m = 0;
            }
            //Si no se le asigna el valor de la consulta
            else {
                $m = $mandamiento->id;
            }
            //Retornamos los valores 
            return back()->with('pdf', 'Accesos directos de pdf creados')
                ->with('cuenta', $cuenta)
                ->with('determinacion', $determinacion->id)
                ->with('requerimiento', $r)
                ->with('mandamiento', $m);
        }
    }
}
