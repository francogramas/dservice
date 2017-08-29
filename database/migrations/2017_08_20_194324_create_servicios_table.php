<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productostarifas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo');
            $table->string('nombre');
            $table->string('descripcion',255);
            $table->double('tarifaparticular');
            $table->double('tarifagrupo');
            $table->double('ingresoconvenio');
            $table->double('ingresogrupo');

            $table->integer('contratistas_id')->unsigned()->index();
            $table->foreign('contratistas_id')->references('id')->on('contratistas');
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
        Schema::drop('productostarifas');
    }
}
