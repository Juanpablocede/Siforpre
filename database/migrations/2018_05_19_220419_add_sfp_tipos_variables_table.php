<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSfpTiposVariablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('sfp_tipos_variables', function (Blueprint $table) {
          $table->string('id_tipovariable',3);
          $table->string('nombre_variable');

          //estableciendo la clave primaria primary key
          $table->primary(['id_tipovariable']);

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
        Schema::dropIfExists('sfp_tipos_variables');
    }
}
