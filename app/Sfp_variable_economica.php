<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sfp_variable_economica extends Model
{
  protected $table = "sfp_variables_economicas";
  protected $primaryKey = 'id_variable'; //Nombre del campo indice que fue dado en la migrations
  protected $fillable =
  [
      'id_variable',
      'ano_presupuesto',
      'id_tipovariable',
      'enero',
      'febrero',
      'marzo',
      'abril',
      'mayo',
      'junio',
      'julio',
      'agosto',
      'septiembre',
      'octubre',
      'noviembre',
      'diciembre',
      'id_registro'
  ];

  public function sfp_tipos_variables()
  {
      return $this->belongsTo('App\sfp_tipo_variable'); //nombre del modelo
  }
}
