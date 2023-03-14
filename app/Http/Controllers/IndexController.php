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
        $Propietario=str_replace("¥", "Ñ",$result[0]->p);
        return response()->json([
            "estado"=>1,
            "result"=>$result,
            "p"=>$Propietario
        ]);
    }
    public function pdf($cuenta){
        $determinacion=determinacionesA::select('id')->where('cuenta',$cuenta)->first();
        if($determinacion->id==''){
            return back()->with('error_empty','No hay pdfs generados');
        }
        $requerimiento=requerimientosA::join('determinacionesA as d', 'd.id', '=', 'requerimientosA.id_d')
        ->select('requerimientosA.id as id')->where('cuenta',$cuenta)->first();
        $mandamiento=determinacionesA::join('requerimientosA as r','determinacionesA.id','=','r.id_d')
        ->join('mandamientosA as m','r.id','=','m.id_r')
        ->select('m.id as id')->where('cuenta',$cuenta)->first();
        return back()->with('pdf','Accesos directos de pdf creados')
        ->with('cuenta', $cuenta)
        ->with('determinacion', $determinacion->id)
        ->with('requerimiento', $requerimiento->id)
        ->with('mandamiento', $mandamiento->id);
    }
}
