<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Unidad_administrativaRequestActualizar extends FormRequest
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
            'ano_presupuesto'       => 'required', 'ano_presupuesto', 'max:4', 'unique:sfp_unidades_administrativas,ano_presupuesto,$ano_presupuesto',
            'id_unidad_admin'       => 'required', 'id_unidad_admin', 'max:25', //'unique:sfp_unidades_administrativas,id_unidad_admin,$id_unidad_admin',
            'nombre_unidad_admin'   => 'required|max:255',
        ];
    }

}
