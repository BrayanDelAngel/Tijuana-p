<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class INPCUpdateRequest extends FormRequest
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
    public function rules()
    {
        //Reglas para la validacion de cada uno de los campos
        return [
            "anioM" => ['required'],
            "mesM" => ['required'],
            "incpM" => ['required'],
        ];
    }
    public function messages()
    {
        //Mensajes personalizados por cada validación
        return [
            'anioM.required' => 'El campo año es requerido',
            'mesM.required' => 'El campo mes es requerido',
            'incpM.required' => 'El campo inpc es requerido',
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
