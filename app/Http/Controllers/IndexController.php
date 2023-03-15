<?php

namespace App\Http\Controllers;

use App\Models\determinacionesA;
use App\Models\requerimientosA;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(){
        return view('components.inicio');
    }
    public function show(Request $request){
        $data=trim($request->valor);
        $result=DB::table('dbo.implementta')
        ->select(['Cuenta as Clave','Propietario as p'])
        ->where('Cuenta','like',$data)->limit(5)
        ->get();
       
       
        return response()->json([
            "estado"=>1,
            "result"=>$result,
            
        ]);
    }
    public function pdf($cuenta){
        //consultamos si ya tiene una determinacion
        $determinacion=determinacionesA::select('id')->where('cuenta',$cuenta)->count();
    //    dd($determinacion);
        if($determinacion==0){
            return back()->with('error_empty','No hay pdfs generados');
        }
        else{
            //consultamos el id de la determinacion
            $determinacion=determinacionesA::select('id')->where('cuenta',$cuenta)->first();

            $requerimiento=requerimientosA::join('determinacionesA as d', 'd.id', '=', 'requerimientosA.id_d')
            ->select('requerimientosA.id as id')->where('cuenta',$cuenta)->first();
            if(!$requerimiento){
                $r=0;
            }
            else{
                $r=$requerimiento->id;
            }
            $mandamiento=determinacionesA::join('requerimientosA as r','determinacionesA.id','=','r.id_d')
            ->join('mandamientosA as m','r.id','=','m.id_r')
            ->select('m.id as id')->where('cuenta',$cuenta)->first();
            if(!$mandamiento){
                $m=0;
            }
            else{
                $m=$mandamiento->id;
            }
            $x=DB::select('select * from determinacionesA where cuenta = ?', [$cuenta]);
        //    dd($x);
            return back()->with('pdf','Accesos directos de pdf creados')
            ->with('cuenta', $cuenta)
            ->with('determinacion', $determinacion->id)
            ->with('requerimiento', $r)
            ->with('mandamiento', $m)
            ->with('xe', $x);
        }
    }
}
