<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratistas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tiposervicios_id')->index()->unsigned();
            $table->string('codigo');
            $table->string('nombre',100);
            $table->string('descripcion',255);
            $table->integer('ciudades_id')->index()->unsigned();
            $table->string('direccion',100);
            $table->string('telefono');
            $table->string('correo');
            $table->string('web',100);

            $table->foreign('tiposervicios_id')->references('id')->on('tiposervicios');
            $table->foreign('ciudades_id')->references('id')->on('ciudades');

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
        //
    }
}
