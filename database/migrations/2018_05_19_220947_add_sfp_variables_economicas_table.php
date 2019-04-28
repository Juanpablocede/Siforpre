<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSfpVariablesEconomicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sfp_variables_economicas', function (Blueprint $table) {
          $table->string('id_variable',3);
          $table->string('ano_presupuesto',4);
          $table->string('id_tipovariable',3);
          $table->double('enero',10,2);
          $table->double('febrero',10,2);
          $table->double('marzo',10,2);
          $table->double('abril',10,2);
          $table->double('mayo',10,2);
          $table->double('junio',10,2);
          $table->double('julio',10,2);
          $table->double('agosto',10,2);
          $table->double('septiembre',10,2);
          $table->double('octubre',10,2);
          $table->double('noviembre',10,2);
          $table->double('diciembre',10,2);

          //estableciendo la clave primaria primary key
          $table->primary(['id_variable', 'ano_presupuesto', 'id_tipovariable'], 'id_variable');
          //estableciendo la clave foranea foreign key (relaciones entre otras tablas)
          $table->foreign(['id_tipovariable'])->
                  references(['id_tipovariable'])->
                  on('sfp_tipos_variables')->
                  onUpdate('cascade')->
                  onDelete('cascade');

          $table->integer('id_registro');

          $table->timestamps();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sfp_variables_economicas');
    }
}
