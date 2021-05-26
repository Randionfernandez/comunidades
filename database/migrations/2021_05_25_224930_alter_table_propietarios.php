<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTablePropietarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { Schema::create('propietarios', function (Blueprint $table) {
         //claves foráneas dentro de la tabla propietarios y las tablas que apuntan
       $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
       $table->foreign('propiedad_id')->references('id')->on('propiedades')->onDelete('cascade');
       $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
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
