<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSedesusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sedesusers', function (Blueprint $table) {
            
            $table->increments('id');
            $table->integer('users_id')->index()->unsigned();
            $table->integer('sedes_id')->index()->unsigned();

            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('sedes_id')->references('id')->on('sedes');

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
