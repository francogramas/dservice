<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned()->index();
            $table->integer('estadosolicitudes_id')->unsigned()->default('1')->index();
            $table->integer('servicioscontratistas_id')->unsigned()->index();
            $table->date('fecha');

            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('estadosolicitudes_id')->references('id')->on('estadosolicitudes');
            $table->foreign('servicioscontratistas_id')->references('id')->on('servicioscontratistas');
            
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
        Schema::drop('solicitudes');
    }
}
