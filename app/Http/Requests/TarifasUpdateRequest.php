<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TarifasUpdateRequest extends FormRequest
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
            "anioM" => ['required'],
            "mesM" => ['required'],
            "tarifaM" => ['required'],
            "tarifaM2" => ['required'],
        ];
    }
    public function messages()
    {
        //Mensajes personalizados por cada validación
        return [
            'anioM.required' => 'El campo año es requerido',
            'mesM.required' => 'El campo mes es requerido',
            'tarifaM.required' => 'El campo tarifa es requerido',
            'tarifaM2.required' => 'El campo tarifa es requerido',
        ];
    }
    public function withValidator($validator)
    {
        //Ai hubo algun error retornamos el con siguiente mensaje y las validaciones que se hicieron
        if ($validator->fails()) {
            return back()->with('errorActualizar', 'Error al actualizar la nueva tarifa')->withErrors($validator);;
        }
    }
}
