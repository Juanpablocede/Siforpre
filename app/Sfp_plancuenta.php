<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sfp_plancuenta extends Model
{
      protected $table = "sfp_plancuentas";
      protected $primaryKey = 'id_plancuenta'; //Nombre del campo indice que fue dado en la migrations
      protected $fillable =
      [
          'id_plancuenta',
          'nombre_cuenta',
          'id_registro'
      ];

      public function Sfp_asignaciones_recursos()
      {
          return $this->hasMany('App\Sfp_asignacion_recurso');
      }
}
