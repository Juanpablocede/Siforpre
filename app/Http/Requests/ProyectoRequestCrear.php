<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProyectoRequestCrear extends FormRequest
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

           'id_proyecto' => 'required|max:25|unique:sfp_proyectos,id_proyecto',
           'nombre_proyecto' => 'required|max:255',
           'tipo'            => 'required|max:1',

            /*'id_empresa'      => 'required|max:4|unique:sfp_proyectos,id_empresa',
            'ano_presupuesto' => 'required|max:4|unique:sfp_proyectos,ano_presupuesto',
            'id_proyecto'     => 'required|max:25|unique:sfp_proyectos,id_proyecto',
            'nombre_proyecto' => 'required|max:255',
            'tipo'            => 'required|max:1',*/
        ];
    }

}
