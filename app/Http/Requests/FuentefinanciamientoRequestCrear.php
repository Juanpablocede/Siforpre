<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuentefinanciamientoRequestCrear extends FormRequest
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
           'ano_presupuesto'               => 'required|max:4',
           'id_fuente_financiamiento'      => 'required|max:25',
           'nombre_fuente_financiamiento'  => 'required|max:255',

        ];
    }

}
