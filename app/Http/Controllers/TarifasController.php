<?php

namespace App\Http\Controllers;

use App\Http\Requests\TarifasRequest;
use App\Http\Requests\TarifasUpdateRequest;
use App\Models\porcentajes_ta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TarifasController extends Controller
{
    public function index()
    {
        //Se cosultan las tarifas en orden descendente junto con el mes, paginando lo en 20 datos 
        $tarifas = porcentajes_ta::orderBy('anio', 'DESC')->orderBy('bim', 'DESC')->paginate(20);
        //Arreglo de los meses 
        $mes = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Nobiembre", "Diciembre"];
        //Pasan Parametros
        return view('components.formTarifas', ['tarifas' => $tarifas, 'mes' => $mes]);
    }
    public function store(TarifasRequest $request)
    {
        //Se llama el request TarifasRequest (es como  un middleware que intercepta antes nuestro request para validarlo )
        //Extraemos la informacion del $request validated para poder registrarlo 
        $data = $request->validated();
        //Se cosulta si el año y mes que se ingreso es igual al mes ingresado
        $unique = DB::select('select anio, bim from porcentajes_ta where anio = ? and  bim= ?', [$data['anioA'], $data['mesA']]);
        //Si es igual retornamos que se repitio estos dos campos y que no se puede añadir
        if ($unique != []) {
            return back()->with('errorUniqueTarifa', 'Año y mes repetidos');
        }
        //Si no se repitio se procede a insertar en la tabla, se usa sql puro por que dicha tabla no tiene un ID o un campo unico
        $insert = DB::insert(
            'INSERT INTO porcentajes_ta
        (anio,bim,factor,tarifa,factor2,tarifa2)
        VALUES (?,?,?,?,?,?)',
            [
                $data['anioA'],
                $data['mesA'],
                $data['factor1A'],
                $data['tarifa1A'],
                $data['factor2A'],
                $data['tarifa2A'],
            ]
        );
        //Si se inserto se retorna a la vista con el siguiente mensage 
        if ($insert) {
            return back()->with('success_tarifa', 'Se agrego correctmente');
        }
    }
    public function update(TarifasUpdateRequest $request)
    {
        $data = $request->validated();
        // $update =DB::update('update users set votes = 100 where name = ?', ['John']);
        $update = DB::update('UPDATE porcentajes_ta
        SET anio = ?
           ,bim=?
           ,factor = ?
           ,tarifa = ?
           ,factor2 = ?
           ,tarifa2 = ?
      WHERE anio = ? and bim =?', [
            $data['anio'],
            $data['mes'],
            $data['factor1'],
            $data['tarifa1'],
            $data['factor2'],
            $data['tarifa2'],
            $data['anio'],
            $data['mes'],
        ]);
        //Si se inserto se retorna a la vista con el siguiente mensage 
        if ($update) {
            return back()->with('success_Updatetarifa', 'Se edito correctmente');
        }
    }
}