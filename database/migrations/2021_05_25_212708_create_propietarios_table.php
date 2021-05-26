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
         $table->bigIncrements('id');
           //clave foránea de tabla propiedad
         $table->unsignedBigInteger('propiedad_id');
              //clave foránea de tabla users
         $table->unsignedBigInteger('user_id');
              //claves foranea roles
            //$table->unsignedBigInteger('role_id');
         $table->string('name');
         $table->string('apellido1')->nullable();
         $table->string('apellido2')->nullable();
         $table->string('email')->unique();
         $table->string('tipo')->nullable();
         $table->string('fecha')->nullable();
         $table->string('nif')->unique()->nullable();
         $table->string('telefono')->nullable();
         $table->string('calle')->nullable();
         $table->string('portal')->nullable();
         $table->string('bloque')->nullable();
         $table->string('escalera')->nullable();
         $table->string('piso')->nullable();
         $table->string('puerta')->nullable();
         $table->string('codigo_pais')->nullable();
         $table->string('cp')->nullable();
         $table->string('pais')->nullable();
         $table->string('provincia')->nullable();
         $table->string('localidad')->nullable();


               //claves foráneas dentro de la tabla propietarios y las tablas que apuntan
         $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
         $table->foreign('propiedad_id')->references('id')->on('propiedades')->onDelete('cascade');
         // $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
         $table->index(['propiedad_id', 'user_id']);

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
        Schema::dropIfExists('propietarios');
    }
}
