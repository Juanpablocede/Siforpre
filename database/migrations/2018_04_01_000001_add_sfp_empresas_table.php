<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSfpEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sfp_empresas', function (Blueprint $table) {
            $table->string('id_empresa',4);
            $table->string('nombre_empresa',100);
            $table->string('direccion_empresa',150);
            $table->string('rif',20);
            $table->string('telefonos',80);
            $table->string('persona_contacto',50);

            $table->primary(['id_empresa']);

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
        Schema::dropIfExists('sfp_empresas');
    }
}
