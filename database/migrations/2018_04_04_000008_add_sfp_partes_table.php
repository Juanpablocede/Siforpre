<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSfpPartesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sfp_partes', function (Blueprint $table) {
            $table->string('id_parte',10);
            $table->string('nombre_parte');
            //estableciendo la clave primaria primary key
            $table->primary(['id_parte']);

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
        Schema::dropIfExists('sfp_partes');
    }
}
