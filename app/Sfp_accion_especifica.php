<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sfp_accion_especifica extends Model
{
  protected $table = "sfp_acciones_especificas";
  protected $primaryKey = 'id_accion_especifica'; //Nombre del campo indice que fue dado en la migrations
  protected $fillable =
  [
      'id_empresa',
      'ano_presupuesto',
      'id_proyecto',
      'id_unidad_admin',
      'id_accion_especifica',
      'nombre_accion_especifica',
      'id_registro'
  ];

  public function Sfp_proyectos()
  {
      return $this->belongsTo('App\Sfp_proyecto');
  }

  public function Sfp_asignaciones_recursos()
  {
    return $this->hasMany('App\Sfp_asignacion_recurso'); //nombre del modelo
  }



}
