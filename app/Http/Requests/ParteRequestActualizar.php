<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParteRequestActualizar extends FormRequest
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
            //'id_parte' => 'required|max:10|unique:sfp_partes,id_parte',

            //'id_parte' => 'required', 'id_parte', 'max:10', 'unique:sfp_partes,id_parte,$id_parte',
            'nombre_parte' => 'required|max:255',
        ];
    }

}
