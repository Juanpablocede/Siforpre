<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Unidad_administrativaRequestCrear extends FormRequest
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
           'ano_presupuesto'     => 'required|max:4:sfp_unidades_administrativas,ano_presupuesto',
           'id_unidad_admin'     => 'required|max:25', //|unique:sfp_unidades_administrativas,id_unidad_admin',
           'nombre_unidad_admin' => 'required|max:255',
        ];
    }

}
