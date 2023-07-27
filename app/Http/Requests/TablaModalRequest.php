<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TablaModalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cuentaT' => ['required'],
            'mesesT' => ['required'],
            'periodoT' => ['required'],
            'lecturaFacturadaT' => ['required'],
            'fecha_vtoT' => ['required','date'],
            'tarifa1T' => ['required','numeric'],
            'sumaTarifasT' => ['required','numeric'],
            'factorT' => ['required','numeric'],
            'saldoAtrasoT' => ['required','numeric'],
            'saldoRezagoT' => ['required','numeric'],
            'totalPeriodoT' => ['required','numeric'],
            'importeMensualT' => ['required','numeric'],
            'RecargosAcumuladosT' => ['required','numeric'],
        ];
    }
    public function messages()
    {
        //Mensajes personalizados por cada validación
        return [
            //Validacion de requerimiento
            'cuentaT.required'=>'El campo cuenta es requerido',
            'mesesT.required'=>'El campo meses es requerido',
            'periodoT.required'=>'El campo periodo es requerido',
            'lecturaFacturadaT.required' => 'El campo lectura facturada es requerido',
            'fecha_vtoT.required'=>'El campo fecha vencimiento es requerido',
            'tarifa1T.required'=>'El campo tarifa es requerido',
            'sumaTarifasT.required'=>'El campo suma tarifas es requerido',
            'factorT.required'=>'El campo factor es requerido',
            'saldoAtrasoT.required'=>'El campo saldo atraso es requerido',
            'saldoRezagoT.required'=>'El campo saldo rezago es requerido',
            'totalPeriodoT.required'=>'El campo total periodo es requerido',
            'importeMensualT.required'=>'El campo importe mensual es requerido',
            'RecargosAcumuladosT.required'=>'El campo recargos acumulados es requerido',
            //Validacion de tipo de dato
            'fecha_vtoT.date'=>'El campo fecha vencimiento debe ser de tipo fecha',
            'tarifa1T.numeric'=>'El campo tarifa debe ser de tipo numerico',
            'sumaTarifasT.numeric'=>'El campo suma tarifas debe ser de tipo numerico',
            'factorT.numeric'=>'El campo factor debe ser de tipo numerico',
            'saldoAtrasoT.numeric'=>'El campo saldo atraso debe ser de tipo numerico',
            'saldoRezagoT.numeric'=>'El campo saldo rezago debe ser de tipo numerico',
            'totalPeriodoT.numeric'=>'El campo total periodo debe ser de tipo numerico',
            'importeMensualT.numeric'=>'El campo importe mensual debe ser de tipo numerico',
            'RecargosAcumuladosT.numeric'=>'El campo recargos acumulados debe ser de tipo numerico',
        ];
    }
    public function withValidator($validator)
    {
        //Ai hubo algun error retornamos el con siguiente mensaje y las validaciones que se hicieron
        if ($validator->fails()) {
            return back()->with('errorActualizarTabla', 'Error al actualizar los datos')->withErrors($validator);;
        }
    }
}
