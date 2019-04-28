<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlancuentaRequestActualizar extends FormRequest
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

            //'id_plancuenta' => 'required', 'id_plancuenta', 'max:9', 'unique:sfp_plancuentas,id_plancuenta,$id_plancuenta',
            'nombre_cuenta' => 'required|max:255',
        ];
    }

}
