<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function (Blueprint $table) {

            $table->id();
            $table->timestamps();
            $table->softDeletes();
            
            $table->string('name', 35)->comment('No modificar el nombre de este campo, o dejará de funcionar la autenticación');
            $table->string('apellidos', 40)->nullable();
            $table->date('fechalta');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->text('profile_photo_path')->nullable();
            $table->integer('MaxFreeCommunities')->default(env('APP_MAX_FREE_COMMUNITIES', 3));

            /*
             * Al integrar usuarios y propietarios en la misma tabla estos campos
             * deben ser opcionales
             * 
             */
            $table->enum('tratamiento', ['Sr.', 'Sra.'])->default('Sr.')->nullable();
            $table->enum('tipo', ['física', 'jurídica'])->nullable()->comment('Tipo de persona');
            $table->string('doi', 12)->nullable()->comment('Doc. Oficial de Identidad: passp, dni, nie, cif');
            $table->string('telefono1')->nullable();
            $table->string('telefono2')->nullable();
            // Dirección postal
            $table->string('direccion', 35)->nullable()->comment('Dirección a efectos de notificaciones; incluye, si hubiese, piso, escalera, etc.');
            $table->char('cp', 5)->nullable()->comment('Código postal');
            $table->string('municipio', 25)->nullable()->comment('Comunidad autónoma y provincia se determina por el cp. Activar después de cp, ');
            $table->string('localidad', 25)->nullable()->comment('Activar después de introducido c.p.');
            $table->char('pais', 3)->default('ESP');

            $table->text('comentario')->nullable();

            $table->foreign('pais')->references('codigoISO3')->on('paises');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('users');
    }

}