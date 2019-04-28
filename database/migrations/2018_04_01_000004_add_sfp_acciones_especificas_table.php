<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSfpAccionesEspecificasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sfp_acciones_especificas', function (Blueprint $table) {
          $table->string('id_empresa',4);
          $table->string('ano_presupuesto',4);
          $table->string('id_proyecto',25);
          $table->string('id_unidad_admin',25);
          $table->string('id_accion_especifica',25);
          $table->string('nombre_accion_especifica');

          //estableciendo la clave primaria primary key
          $table->primary(['id_empresa',
                            'ano_presupuesto',
                            'id_proyecto',
                            'id_unidad_admin',
                            'id_accion_especifica'],
                            'id_accion_especifica');
          //estableciendo la clave foranea foreign key (relaciones entre otras tablas)
          $table->foreign(['id_empresa'])->
                  references(['id_empresa'])->
                  on('sfp_empresas')->
                  onUpdate('cascade')->
                  onDelete('cascade');
          /*$table->foreign(['id_empresa','ano_presupuesto','id_proyecto'])->
                  references(['id_empresa','ano_presupuesto','id_proyecto'])->
                  on('sfp_proyectos')->
                  onUpdate('cascade')->
                  onDelete('cascade');*/
          $table->foreign(['id_empresa','ano_presupuesto','id_proyecto','id_unidad_admin'])->
                  references(['id_empresa','ano_presupuesto','id_proyecto','id_unidad_admin'])->
                  on('sfp_unidades_administrativas')->
                  onUpdate('cascade')->
                  onDelete('cascade');

          $table->integer('id_registro');

          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sfp_acciones_especificas');
    }
}
