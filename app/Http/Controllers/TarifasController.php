<?php

namespace App\Http\Controllers;

use App\Models\porcentajes_ta;
use Illuminate\Http\Request;

class TarifasController extends Controller
{
    public function index(){
        $tarifas=porcentajes_ta::orderBy('anio', 'DESC')->orderBy('bim', 'DESC')->paginate(20);
        $mes = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Nobiembre", "Diciembre"];
        return view('components.formTarifas',['tarifas'=>$tarifas,'mes'=>$mes]);
    }
    public function store(Request $request){
        dd($request->all());
    }
}
