<?php

namespace App\Http\Controllers;

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
        ->select(['Cuenta as Clave','Propietario',])
        ->where('Cuenta','like',$data)->limit(5)
        ->get();
        return response()->json([
            "estado"=>1,
            "result"=>$result
        ]);
        
    }
}
