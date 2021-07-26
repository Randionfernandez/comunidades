<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedoresTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();

            $table->date('fechalta');
            $table->string('doi')->unique()->comment('Documento oficial de identidad: pasaporte, dni, cif, nie');
            $table->enum('persona', ['física', 'jurídica']);
            $table->string('nombre', 25);
            $table->string('apellidos', 40)->nullable()->comment('NULL si la persona es jurídica');
            $table->string('email')->unique();
            $table->string('telefono1', 14);
            $table->string('telefono2', 14)->nullable();
            $table->string('dir_postal',40)->comment('Incluirá tipo de vía, número, piso, portal, bloque, escalera, etc');
            $table->char('cp', 5)->comment('Un mismo código postal puede pertenecer a más de un municipio, y por tanto también, a más de una loclalidad'); 
            $table->char('actividad')->comment('Actividad principal a la que se dedica: seguros, albañilería, limpieza, etc');
            $table->char('pais', 3)->default('ESP')->comment('CódigoISO del país');
            $table->string('localidad', 35)->comment('Municipio, quizás seguido de localidad. Será un select determinado por cp.');
            $table->char('iban', 24);
            $table->text('comentario')->nullable();
            
            $table->foreign('pais')->references('codigoISO')->on('paises');
            $table->foreign('actividad')->references('codigo')->on('actividades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('proveedores');
    }

}