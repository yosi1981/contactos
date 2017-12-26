<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaquetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('paquetes', function (Blueprint $table) {
            $table->increments('idpaquete');
            $table->enum('tipo', ['GRATIS', 'PAGO'])->default('GRATIS');
            $table->integer('idpago')->unsigned();
            $table->integer('idanunciante')->unsigned();
            $table->integer('total');
            $table->integer('dcontratados');
            $table->integer('drestantes');
            $table->date('fechaReg');
            $table->date('fechaUlt');
            $table->enum('estado', ['EN VIGOR', 'AGOTADO'])->default('EN VIGOR');

        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::drop('paquetes');

    }
}
