<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CentrocostoRequestCrear extends FormRequest
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
            'id_unidad_admin'   => 'required|max:25|unique:sfp_centrocostos,id_unidad_admin',

            //'id_empresa' => 'required', 'id_empresa', 'max:4', 'unique:sfp_empresas,id_empresa,$id_empresa',

            'nombre_centrocosto' => 'required|max:255',
        ];
    }

}
