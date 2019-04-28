<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VariableEconomicaRequestActualizar extends FormRequest
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
        return
        [
            //'id_empresa' => 'required|max:4|unique:sfp_empresas,id_empresa',

            'id_variable'     => 'required', 'id_variable', 'max:3', 'unique:ssfp_variables_economicas,id_variable,$id_variable',
            'ano_presupuesto' => 'rquired|max:4',
            
        ];
    }

}
