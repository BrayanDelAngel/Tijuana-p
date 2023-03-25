<?php

namespace App\Http\Controllers;

use App\Http\Requests\TarifasRequest;
use App\Http\Requests\TarifasUpdateRequest;
use App\Models\INPC;
use App\Models\porcentajes_ta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TarifasController extends Controller
{
    public function index()
    {
        //Se cosultan las tarifas en orden descendente junto con el mes, paginando lo en 20 datos 
        $tarifas = INPC::orderBy('Anio', 'DESC')->orderBy('Mes', 'DESC')->paginate(20);
        //Arreglo de los meses 
        $mes = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Nobiembre", "Diciembre"];
        //consultamos el mes y anio a agregar
        $mes_agregar=$tarifas[0]->Mes+1;
        $anio_agregar=$tarifas[0]->Anio;
        //si el mes a agregr es 13 entonces pasara a ser uno
        if($mes_agregar==13){
            $mes_agregar=1;
            $anio_agregar+=1;
        }
       
        //Pasan Parametros
        return view('components.formTarifas', ['tarifas' => $tarifas, 'mes' => $mes,'mes_agregar'=>$mes_agregar,'anio_agregar'=>$anio_agregar]);
    }
    public function store(TarifasRequest $request)
    {
        //Se llama el request TarifasRequest (es como  un middleware que intercepta antes nuestro request para validarlo )
        //Extraemos la informacion del $request validated para poder registrarlo 
        $data = $request->validated();
        //Se genera un arreglo de los meses
        $mes = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Nobiembre", "Diciembre"];
        //Se hace el conteo del 
        $count_mes=count($mes);
        $mes_insert=0;
        for ($i=1; $i <=$count_mes ; $i++) { 
            if( $request->mesA==$mes[$i-1]){
                $mes_insert=$i;
                break;
            }
        }
        $r = new INPC();
        //guardamos los datos en INPC
        $r->Anio = $request->anioA;
        $r->Mes = $mes_insert;
        $r->INCP = $request->incp;
        $r->save();
        //Si se inserto se retorna a la vista con el siguiente mensage 
        if ($r) {
            return back()->with('success_tarifa', 'Se agrego correctmente');
        }
    }
}
