<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sfp_empresa extends Model
{
  protected $table = "sfp_empresas";
  protected $primaryKey = 'id_empresa'; //Nombre del campo indice que fue dado en la migrations
  protected $fillable =
  [
      'id_empresa',
      'nombre_empresa',
      'direccion_empresa',
      'rif',
      'telefonos',
      'persona_contacto',
      'id_registro'
  ];

  public function Sfp_asignaciones_recursos()
  {
      return $this->hasMany('App\Sfp_asignacion_recurso');
  }

  public function Sfp_proyectos()
  {
      return $this->hasMany('App\Sfp_proyecto');
  }


}
