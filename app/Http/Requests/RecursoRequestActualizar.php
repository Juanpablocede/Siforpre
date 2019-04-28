<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecursoRequestActualizar extends FormRequest
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

            //'id_recurso'        => 'required', 'id_recurso', 'max:20', 'unique:sfp_recursos,id_recurso,$id_recurso',
            'nombre_recurso'    => 'required|max:255',
            'id_parte'          => 'required|max:10',
            'id_unimed'         => 'required|max:10',
            'precio'            => 'required',
            'id_plancuenta'     => 'required|max:9',
            'id_plancuenta'     => 'required|max:9',
            'id_cuentacontable' => 'required|max:25',
        ];
    }

}
