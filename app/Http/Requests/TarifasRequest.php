<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TarifasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //Autorizacion del request
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //Reglas para la validacion de cada uno de los campos
        return [
            "anioA" => ['required'],
            "mesA" => ['required'],
            "tarifa" => ['required'],
            "tarifa2" => ['required'],
        ];
    }
    public function messages()
    {
        //Mensajes personalizados por cada validación
        return [
            'anioA.required' => 'El campo año es requerido',
            'mesA.required' => 'El campo mes es requerido',
            'tarifa.required' => 'El campo tarifa es requerido',
            'tarifa2.required' => 'El campo tarifa es requerido',
        ];
    }
    public function withValidator($validator)
    {
         //Ai hubo algun error retornamos el con siguiente mensaje y las validaciones que se hicieron
        if ($validator->fails()) {
            return back()->with('errorAgregar', 'Error al agregar la nueva tarifa')->withErrors($validator);;
        }
    }
}
