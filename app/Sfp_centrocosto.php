<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sfp_centrocosto extends Model
{
  protected $table = "sfp_centrocostos";
  protected $primaryKey = 'id_unidad_admin'; //Nombre del campo indice que fue dado en la migrations
  protected $fillable =
  [
      'id_unidad_admin',
      'nombre_centrocosto',
      'id_registro'
  ];

  public function sfp_unidades_administrativas()
  {
      return $this->hasMany('App\sfp_unidad_administrativa'); //nombre del modelo
  }

}
