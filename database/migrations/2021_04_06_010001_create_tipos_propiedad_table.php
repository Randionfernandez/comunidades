<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposPropiedadTable extends Migration
{
    /**
     * Run the migrations.
     * Dominio de los tipos de propiedades disponibles en la aplicacion
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_propiedad', function (Blueprint $table) {
            $table->id();
            $table->string('abreviatura');
            $table->string('nombre');
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
        Schema::dropIfExists('tipos_propiedad');
    }
}
