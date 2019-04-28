<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSfpPlancuentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sfp_plancuentas', function (Blueprint $table) {
            $table->string('id_plancuenta',9);
            $table->string('nombre_cuenta');

            $table->primary(['id_plancuenta']);

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
        Schema::dropIfExists('sfp_plancuentas');
    }
}
