<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSfpCentrocostosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sfp_centrocostos', function (Blueprint $table) {
            $table->string('id_unidad_admin',25);
            $table->string('nombre_centrocosto');

            //estableciendo la clave primaria primary key
            $table->primary(['id_unidad_admin']);
            //estableciendo la clave foranea foreign key (relaciones entre otras tablas)
            /*$table->foreign(['id_unidad_admin'])->
                    references(['id_unidad_admin'])->
                    on('sfp_unidades_administrativas')->
                    onUpdate('cascade')->
                    onDelete('cascade');*/

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
        Schema::dropIfExists('sfp_centrocostos');
    }
}
