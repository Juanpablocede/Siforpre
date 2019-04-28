<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sfp_asignacion_recurso extends Model
{
  protected $table = "sfp_asignaciones_recursos";
  protected $primaryKey = 'id_recurso'; //Nombre del campo indice que fue dado en la migrations
  protected $fillable =
  [
      'id_empresa',
      'ano_presupuesto',
      'id_proyecto',
      'id_unidad_admin',
      'id_accion_especifica',
      'id_actividad',
      'id_fuente_financiamiento',
      'tipo',
      'id_recurso',
      'precio_recurso',
      'id_plancuenta',
      'escenario',
      'cantidad_enero',
      'monto_enero',
      'cantidad_febrero',
      'monto_febrero',
      'cantidad_marzo',
      'monto_marzo',
      'cantidad_abril',
      'monto_abril',
      'cantidad_mayo',
      'monto_mayo',
      'cantidad_junio',
      'monto_junio',
      'cantidad_julio',
      'monto_julio',
      'cantidad_agosto',
      'monto_agosto',
      'cantidad_septiembre',
      'monto_septiembre',
      'cantidad_octubre',
      'monto_octubre',
      'cantidad_noviembre',
      'monto_noviembre',
      'cantidad_diciembre',
      'monto_diciembre',
      'id_registro'
  ];

  public function Sfp_proyectos()
  {
      return $this->belongsTo('App\Sfp_proyecto');
  }

  public function Sfp_unidades_administrativas()
  {
      return $this->belongsTo('App\Sfp_unidad_administrativa');
  }

  public function Sfp_acciones_especificas()
  {
      return $this->belongsTo('App\Sfp_accion_especifica');
  }

  public function Sfp_actividades()
  {
      return $this->belongsTo('App\Sfp_actividad');
  }

  public function Sfp_fuentes_financiamientos()
  {
      return $this->belongsTo('App\Sfp_fuente_financiamiento');
  }

  public function Sfp_empresas()
  {
      return $this->belongsTo('App\Sfp_empresa');
  }

  public function Sfp_recursos()
  {
      return $this->belongsTo('App\Sfp_recurso');
  }

  public function Sfp_plancuentas()
  {
      return $this->belongsTo('App\Sfp_plancuenta');
  }

}
