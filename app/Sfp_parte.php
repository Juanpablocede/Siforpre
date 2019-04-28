<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sfp_parte extends Model
{
    protected $table = "sfp_partes";
    protected $primaryKey = 'id_parte'; //Nombre del campo indice que fue dado en la migrations
    protected $fillable =
    [
        'id_parte',
        'nombre_parte',
        'id_registro'
    ];

    public function Sfp_recursos()
    {
        return $this->hasMany('App\Sfp_recurso');
    }
}
