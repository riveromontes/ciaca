<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
              ->onUpdate('cascade')->onDelete('cascade');

            $table->string('nombre');
            $table->string('apellido');
            $table->string('cedula');
            $table->string('pasaporte');
            $table->date('f_nacimiento');
            $table->integer('peso');
            $table->decimal('estatura', 3,2);
            $table->char('sexo', 1);
            $table->string('grupo_sangre');
            $table->string('direccion');
            $table->string('estado');
            $table->string('municipio');
            $table->string('ciudad');
            $table->string('codigo_postal');
            $table->string('tlf_local');
            $table->string('tlf_movil');
            $table->string('correo');
            $table->string('nombre_emerg');
            $table->string('tlf1_emerg');
            $table->string('tlf2_emerg');
            $table->string('tlf3_emerg');
            $table->string('tipo_licencia');
            $table->date('vence_certificado');
            $table->date('vence_licencia');
            $table->decimal('horas_externas', 8,2);
            $table->char('evaluacion_medica', 1);
            $table->boolean('hab_instrumental')->default(false);;
            $table->boolean('hab_monomotor')->default(false);;
            $table->boolean('hab_multimotor')->default(false);;
            $table->decimal('horas_pic', 8,2);
            $table->decimal('horas_sic', 8,2);

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
        Schema::dropIfExists('estudiantes');
    }
}
