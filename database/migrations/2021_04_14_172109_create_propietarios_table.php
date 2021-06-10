<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropietariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propietarios', function (Blueprint $table) {
            $table->id();
            $table->enum("Tratamiento", ["Sr", "Sra"]);
            $table->string("Nombre");
            $table->string('Apellido1');
            $table->string('Apellido2');
            $table->enum("Tipo", ["Fisica", "Juridica"]);
            $table->date('Fecha');
            $table->string('DNI');
            $table->string('Email');
            $table->string('Telefono');
            $table->string('Calle');
            $table->string('Portal');
            $table->string('Bloque');
            $table->string('Escalera');
            $table->string('Piso');
            $table->string('Puerta');
            $table->string('Codigo_pais');
            $table->string('CP');
            $table->string('Pais');
            $table->string('Provincia');
            $table->string('Localidad');
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
        Schema::dropIfExists('propietarios');
    }
}
