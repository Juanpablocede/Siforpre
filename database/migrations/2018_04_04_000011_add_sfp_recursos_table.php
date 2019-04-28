<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSfpRecursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sfp_recursos', function (Blueprint $table) {
            $table->string('id_recurso',20);
            $table->string('nombre_recurso');
            $table->string('id_parte',10);
            $table->string('id_unimed',10);
            $table->double('precio',15,2);
            $table->string('id_plancuenta',9);
            $table->string('id_cuentacontable',25);

            //estableciendo la clave primaria primary key
            $table->primary(['id_recurso']);
            //estableciendo la clave foranea foreign key (relaciones entre otras tablas)
            $table->foreign(['id_parte'])->
                    references(['id_parte'])->
                    on('sfp_partes')->
                    onUpdate('cascade')->
                    onDelete('cascade');

            $table->foreign(['id_unimed'])->
                    references(['id_unimed'])->
                    on('sfp_unidadmedidas')->
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
        Schema::dropIfExists('sfp_recursos');
    }
}
