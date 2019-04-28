<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sfp_actividad extends Model
{
  protected $table = "sfp_actividades";
  protected $primaryKey = 'id_actividad'; //Nombre del campo indice que fue dado en la migrations
  protected $fillable =
  [
      'id_empresa',
      'ano_presupuesto',
      'id_proyecto',
      'id_unidad_admin',
      'id_accion_especifica',
      'id_actividad',
      'nombre_actividad',
      'id_registro'
  ];


  public function Sfp_proyectos()
  {
      return $this->belongsTo('App\Sfp_proyecto');
  }

  public function Sfp_asignaciones_recursos()
  {
      return $this->hasMany('App\Sfp_asignacion_recurso');
  }

}
