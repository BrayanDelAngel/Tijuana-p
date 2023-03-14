<?php

namespace App\Http\Controllers;

use App\Models\porcentajes_ta;
use Illuminate\Http\Request;

class TarifasController extends Controller
{
    public function index(){
        $tarifas=porcentajes_ta::orderBy('anio', 'DESC')->paginate(20);
        return view('components.formTarifas',['tarifas'=>$tarifas]);
    }
}
