<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AsignacionrecursoRequestCrear extends FormRequest
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
          'id_empresa'                => 'required',
          'ano_presupuesto'           => 'required',
          'id_proyecto'               => 'required',
          'id_unidad_admin'           => 'required',
          'id_accion_especifica'      => 'required',
          'id_actividad'              => 'required',
          'id_fuente_financiamiento'  => 'required',
          'tipo'                      => 'required',
          'id_recurso'                => 'required',
          'precio_recurso'            => 'required',
          'id_plancuenta'             => 'required',
          'escenario'                 => 'required',  

        ];
    }

}
