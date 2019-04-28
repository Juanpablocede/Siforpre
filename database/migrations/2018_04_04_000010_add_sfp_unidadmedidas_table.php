<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSfpUnidadmedidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sfp_unidadmedidas', function (Blueprint $table) {
            $table->string('id_unimed',10);
            $table->string('nombre_unidad');
            //estableciendo la clave primaria primary key
            $table->primary(['id_unimed']);

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
        Schema::dropIfExists('sfp_unidadmedidas');
    }
}
