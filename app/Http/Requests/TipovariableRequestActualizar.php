<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipovariableRequestActualizar extends FormRequest
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

            //'id_tipovariable'      => 'required', 'id_tipovariable', 'max:3', 'unique:sfp_tipos_variables,id_tipovariable,$id_tipovariable',
            'nombre_variable'  => 'required|max:255',

        ];
    }

}
