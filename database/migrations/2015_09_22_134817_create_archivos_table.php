<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivos', function(Blueprint $table)
		{
			$table->increments('id');
			
			$table->integer('archivos_id')->unsigned()->nullable();
            $table->foreign('archivos_id')->references('id')->on('archivos');
			
            $table->string('nombre');
            $table->string('identificacion');
			$table->enum('tipo',['archivo','pagina','rama','root'])->default('rama');
            $table->string('email');
			$table->timestamps();
            $table->softDeletes();
		});
        $nerd = new \App\Archivo();
        $nerd->nombre       = 'Raiz';
        $nerd->identificacion = 'No modificar, archivo de sistema: '.';';
        $nerd->email='wcadena@outlook.com';
        $nerd->tipo = 'root';
        $nerd->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('archivos');
    }
}
