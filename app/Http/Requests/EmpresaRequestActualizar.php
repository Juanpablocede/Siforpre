<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaRequestActualizar extends FormRequest
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

            //'id_empresa'         => 'required', 'id_empresa', 'max:4', 'unique:sfp_empresas,id_empresa,$id_empresa',

            'nombre_empresa'     => 'required|max:100',
            'direccion_empresa'  => 'required|max:150',
            'rif'                => 'required|max:20',
            'telefonos'          => 'required|max:30',
            'persona_contacto'   => 'required|max:80|regex:/^[A-Z][a-z]*/',
        ];
    }

}
