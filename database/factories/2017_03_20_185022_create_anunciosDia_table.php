<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnunciosDiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anunciosDia', function (Blueprint $table) {
            Schema::enableForeignKeyConstraints();
            $table->increments('idanuncioDia');
            $table->date('fecha');
            $table->integer('idanuncio')->unsigned();
            $table->integer('idlocalidad')->unsigned();
            $table->integer('idrespprov')->unsigned();
            $table->integer('idrespprovorigen')->unsigned();
            $table->double('numvisitas');
            $table->integer('idpaquete')->unsigned();

        }); //
        Schema::table('anunciosDia', function (Blueprint $table) {
            $table->foreign('idanuncio')->references('idanuncio')->on('anuncios');
            $table->foreign('idlocalidad')->references('idlocalidad')->on('localidades');
            $table->foreign('idrespprov')->references('id')->on('usuarios');
            $table->foreign('idrespprovorigen')->references('id')->on('usuarios');
            $table->foreign('idpaquete')->references('idpaquete')->on('paquetes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('anunciosDia');
    }
}
