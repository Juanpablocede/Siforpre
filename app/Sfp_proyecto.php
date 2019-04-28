<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sfp_proyecto extends Model
{
  protected $table = "sfp_proyectos";
  protected $primaryKey = 'id_proyecto'; //Nombre del campo indice que fue dado en la migrations
  protected $fillable   =
  [
      'id_empresa',
      'ano_presupuesto',
      'id_proyecto',
      'nombre_proyecto',
      'tipo',
      'id_registro'
  ];

  public function Sfp_unidades_administrativas()
  {
      return $this->hasMany('App\Sfp_unidad_administrativa');
  }

  public function Sfp_acciones_especificas()
  {
      return $this->hasMany('App\Sfp_accion_especifica');
  }

  public function Sfp_actividades()
  {
      return $this->hasMany('App\Sfp_actividad');
  }

  public function Sfp_asignaciones_recursos()
  {
      return $this->hasMany('App\Sfp_asignacion_recurso'); //nombre del modelo
  }

  public function Sfp_empresas()
  {
      return $this->belongsTo('App\Sfp_empresa'); //nombre del modelo
  }

}
