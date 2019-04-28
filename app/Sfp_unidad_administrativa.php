<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sfp_unidad_administrativa extends Model
{
    protected $table = "sfp_unidades_administrativas";
    protected $primaryKey = 'id_unidad_admin'; //Nombre del campo indice que fue dado en la migrations
    protected $fillable =
    [
        'id_empresa',
        'ano_presupuesto',
        'id_proyecto',
        'id_unidad_admin',
        'nombre_unidad_admin',
        'id_registro'
    ];

    public function Sfp_proyectos()
    {
        return $this->belongsTo('App\Sfp_proyecto');
    }

    public function Sfp_asignaciones_recursos()
    {
        return $this->belongsTo('App\Sfp_asignacion_recurso'); //nombre del modelo
    }

    public function sfp_centrocostos()
    {
        return $this->belongsTo('App\sfp_centrocosto'); //nombre del modelo
    }

}
