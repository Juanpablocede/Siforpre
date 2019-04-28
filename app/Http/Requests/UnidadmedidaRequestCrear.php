<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnidadmedidaRequestCrear extends FormRequest
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
            'id_unimed' => 'required|max:10|unique:sfp_unidadmedidas,id_unimed',

            //'id_unimed' => 'required', 'id_unimed', 'max:10', 'unique:sfp_unidadmedidas,id_unimed,$id_unimed',

            'nombre_unidad' => 'required|max:255',
        ];
    }

}
