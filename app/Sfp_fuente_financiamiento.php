<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sfp_fuente_financiamiento extends Model
{
  protected $table = "sfp_fuentes_financiamientos";
  protected $primaryKey = 'id_fuente_financiamiento'; //Nombre del campo indice que fue dado en la migrations
  protected $fillable =
  [
      'id_empresa',
      'ano_presupuesto',
      'id_fuente_financiamiento',
      'nombre_fuente_financiamiento',
      'id_registro'
  ];

  public function Sfp_asignaciones_recursos()
  {
      return $this->hasMany('App\Sfp_asignacion_recurso');
  }

}
