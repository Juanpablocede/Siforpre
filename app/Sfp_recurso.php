<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sfp_recurso extends Model
{
    protected $table = "sfp_recursos";
    protected $primaryKey = 'id_recurso'; //Nombre del campo indice que fue dado en la migrations
    protected $fillable =
    [
        'id_recurso',
        'nombre_recurso',
        'id_parte',
        'id_unimed',
        'precio',
        'id_plancuenta',
        'id_cuentacontable',
        'id_registro'
    ];

    public function Sfp_asignaciones_recursos()
    {
        return $this->hasMany('App\Sfp_asignacion_recurso');
    }

    public function Sfp_partes()
    {
        return $this->belongsTo('App\Sfp_parte');
    }

    public function Sfp_unidadmedidas()
    {
        return $this->belongsTo('App\Sfp_unidadmedida');
    }
}
