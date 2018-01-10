<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisos', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('archivos_id')->unsigned()->nullable();
            $table->foreign('archivos_id')->references('id')->on('archivos');

            $table->string("perfil");
            $table->enum('tipo',['lectura','descarga','denegar','administracion'])->default('lectura');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('permisos');
    }
}
