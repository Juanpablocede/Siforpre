<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSfpAsignacionesRecursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sfp_asignaciones_recursos', function (Blueprint $table) {
          $table->string('id_empresa',4);
          $table->string('ano_presupuesto',4);
          $table->string('id_proyecto',25);
          $table->string('id_unidad_admin',25);
          $table->string('id_accion_especifica',25);
          $table->string('id_actividad',25);
          $table->string('id_fuente_financiamiento',25);
          $table->string('tipo',1);
          $table->string('id_recurso',20);
          $table->double('precio_recurso',10,2);
          $table->string('id_plancuenta',9);
          $table->string('escenario',1);
          $table->double('cantidad_enero',10,2);
          $table->double('monto_enero',15,2);
          $table->double('cantidad_febrero',10,2);
          $table->double('monto_febrero',15,2);
          $table->double('cantidad_marzo',10,2);
          $table->double('monto_marzo',15,2);
          $table->double('cantidad_abril',10,2);
          $table->double('monto_abril',15,2);
          $table->double('cantidad_mayo',10,2);
          $table->double('monto_mayo',15,2);
          $table->double('cantidad_junio',10,2);
          $table->double('monto_junio',15,2);
          $table->double('cantidad_julio',10,2);
          $table->double('monto_julio',15,2);
          $table->double('cantidad_agosto',10,2);
          $table->double('monto_agosto',15,2);
          $table->double('cantidad_septiembre',10,2);
          $table->double('monto_septiembre',15,2);
          $table->double('cantidad_octubre',10,2);
          $table->double('monto_octubre',15,2);
          $table->double('cantidad_noviembre',10,2);
          $table->double('monto_noviembre',15,2);
          $table->double('cantidad_diciembre',10,2);
          $table->double('monto_diciembre',15,2);

          //estableciendo la clave primaria primary key

          $table->primary([ 'id_empresa',
                            'ano_presupuesto',
                            'id_proyecto',
                            'id_unidad_admin',
                            'id_accion_especifica',
                            'id_actividad',
                            'id_fuente_financiamiento',
                            'tipo',
                            'id_recurso'],
                            'id_recurso');

          //estableciendo la clave foranea foreign key (relaciones entre otras tablas)
          /*$table->foreign(['id_empresa', 'ano_presupuesto', 'id_proyecto'])->
                  references(['id_empresa', 'ano_presupuesto', 'id_proyecto'])->
                  on('sfp_proyectos')->
                  onUpdate('cascade')->
                  onDelete('cascade');*/

          /*$table->foreign(['id_empresa', 'ano_presupuesto', 'id_proyecto', 'id_unidad_admin'])->
                  references(['id_empresa', 'ano_presupuesto', 'id_proyecto', 'id_unidad_admin'])->
                  on('sfp_unidades_administrativas')->
                  onUpdate('cascade')->
                  onDelete('cascade');*/

          $table->foreign(['id_empresa', 'ano_presupuesto','id_proyecto','id_unidad_admin', 'id_accion_especifica'])->
                  references(['id_empresa', 'ano_presupuesto','id_proyecto','id_unidad_admin', 'id_accion_especifica'])->
                  on('sfp_acciones_especificas')->
                  onUpdate('cascade')->
                  onDelete('cascade');

          /*$table->foreign(['id_empresa', 'ano_presupuesto', 'id_proyecto', 'id_unidad_admin', 'id_accion_especifica', 'id_actividad'])->
                  references(['id_empresa', 'ano_presupuesto', 'id_proyecto', 'id_unidad_admin', 'id_accion_especifica', 'id_actividad'])->
                  on('sfp_actividades')->
                  onUpdate('cascade')->
                  onDelete('cascade');*/

          $table->foreign(['id_empresa', 'ano_presupuesto', 'id_fuente_financiamiento'])->
                  references(['id_empresa', 'ano_presupuesto', 'id_fuente_financiamiento'])->
                  on('sfp_fuentes_financiamientos')->
                  onUpdate('cascade')->
                  onDelete('cascade');

          $table->foreign(['id_empresa'])->
                  references(['id_empresa'])->
                  on('sfp_empresas')->
                  onUpdate('cascade')->
                  onDelete('cascade');

          $table->foreign(['id_plancuenta'])->
                  references(['id_plancuenta'])->
                  on('sfp_plancuentas')->
                  onUpdate('cascade')->
                  onDelete('cascade');

          $table->foreign(['id_recurso'])->
                  references(['id_recurso'])->
                  on('sfp_recursos')->
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
        Schema::dropIfExists('sfp_asignaciones_recursos');
    }
}
