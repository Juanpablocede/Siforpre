<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccionespecificaRequestActualizar extends FormRequest
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
            'ano_presupuesto'           => 'required', 'ano_presupuesto', 'max:4', 'unique:sfp_acciones_especificas,ano_presupuesto,$ano_presupuesto',
            //'id_accion_especifica'      => 'required', 'id_accion_especifica', 'max:25', 'unique:sfp_acciones_especificas,id_accion_especifica,$id_accion_especifica',
            'id_accion_especifica'      => 'required', 'id_accion_especifica', 'max:25',
            'nombre_accion_especifica'  => 'required|max:255',
        ];
    }

}
