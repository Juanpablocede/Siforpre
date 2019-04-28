<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sfp_unidadmedida extends Model
{
    protected $table = "sfp_unidadmedidas";
    protected $primaryKey = 'id_unimed'; //Nombre del campo indice que fue dado en la migrations
    protected $fillable =
    [
        'id_unimed',
        'nombre_unidad',
        'id_registro'
    ];

    public function Sfp_recursos()
    {
        return $this->hasMany('App\Sfp_recurso');
    }
}
