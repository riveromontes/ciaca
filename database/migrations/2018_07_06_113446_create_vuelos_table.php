<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVuelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vuelos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_estudiante')->unsigned();
            $table->foreign('id_estudiante')->references('id')->on('estudiantes')
              ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('id_instructor')->unsigned();
            $table->foreign('id_instructor')->references('id')->on('instructors')
              ->onUpdate('cascade')->onDelete('cascade');

            $table->decimal('horas_voladas', 8,2);
            $table->date('fecha_vuelo');
            $table->string('modalidad');
            $table->decimal('horas_helice', 8,2);
            $table->decimal('horas_aceite', 8,2);
            $table->decimal('horas_fuselaje', 8,2);
            $table->decimal('horas_bujias', 8,2);
            $table->string('avion');

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
        Schema::dropIfExists('vuelos');
    }
}
