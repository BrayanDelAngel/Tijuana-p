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
            "anioA" => ['required'],
            "mesA" => ['required'],
            "tarifa1A" => ['required'],
            "factor1A" => ['required'],
            "tarifa2A" => ['required'],
            "factor2A" => ['required'],
        ];
    }
    public function messages()
    {
        return [
            'anioA.required' => 'El campo año es requerido',
            'mesA.required' => 'El campo mes es requerido',
            'tarifa1A.required' => 'El campo tarifa no domestico es requerido',
            'factor1A.required' => 'El campo factor no domestico es requerido',
            'tarifa2A.required' => 'El campo tarifa domestico es requerido',
            'factor2A.required' => 'El campo factor domestico es requerido',
        ];
    }
    public function withValidator($validator)
    {
        if ($validator->fails()) {
            return back()->with('errorAgregar', 'Error al agregar la nueva tarifa')->withErrors($validator);;
        }
    }
}
