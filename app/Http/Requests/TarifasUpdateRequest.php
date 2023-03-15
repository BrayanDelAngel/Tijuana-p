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
            "anio" => ['required'],
            "mes" => ['required'],
            "tarifa1" => ['required'],
            "factor1" => ['required'],
            "tarifa2" => ['required'],
            "factor2" => ['required'],
        ];
    }
    public function messages()
    {
        return [
            'anio.required' => 'El campo año es requerido',
            'mes.required' => 'El campo mes es requerido',
            'tarifa1.required' => 'El campo tarifa no domestico es requerido',
            'factor1.required' => 'El campo factor no domestico es requerido',
            'tarifa2.required' => 'El campo tarifa domestico es requerido',
            'factor2.required' => 'El campo factor domestico es requerido',
        ];
    }
    public function withValidator($validator)
    {
        if ($validator->fails()) {
            return back()->with('errorActualizar', 'Error al actualizar la nueva tarifa')->withErrors($validator);;
        }
    }
}
