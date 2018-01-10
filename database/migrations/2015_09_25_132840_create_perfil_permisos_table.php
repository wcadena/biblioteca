<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerfilPermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfil_permisos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('permisos_id')->unsigned()->nullable();
            $table->foreign('permisos_id')->references('id')->on('permisos');

            $table->integer('perfils_id')->unsigned()->nullable();
            $table->foreign('perfils_id')->references('id')->on('perfils');
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
        Schema::drop('perfil_permisos');
    }
}
