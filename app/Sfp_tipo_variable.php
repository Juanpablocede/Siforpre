<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sfp_tipo_variable extends Model
{
  protected $table = "sfp_tipos_variables";
  protected $primaryKey = 'id_tipovariable'; //Nombre del campo indice que fue dado en la migrations
  protected $fillable =
  [
      'id_tipovariable',
      'nombre_variable',
      'id_registro'
  ];

  public function sfp_variables_economicas()
  {
      return $this->hasMany('App\sfp_variable_economica'); //nombre del modelo
  }
}
