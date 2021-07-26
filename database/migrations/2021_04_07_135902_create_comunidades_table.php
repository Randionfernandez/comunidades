<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComunidadesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('comunidades', function (Blueprint $table) {
            
            $table->id();

            $table->string('cif', 9)->unique();
            $table->date('fechalta');
            $table->boolean('activa')->default(true)->comment('Si no está activa, no se pueden realizar operaciones sobre esta comunidad');
            $table->boolean('gratuita')->default(true)->comment('Indica si esta comnidad es de pago o gratuita');  
            $table->integer('partes')->default(10)->comment('Cantidad de unidades registrales que componen la comunidad');
            $table->string('denom', 35)->comment('Nombre de la comunidad');
            $table->string('direccion', 40);
            $table->string('localidad', 35)->nullable();
            $table->string('provincia')->nullable();
            $table->char('cp', 5)->comment('Código postal');
            $table->char('pais',3)->default('ESP')->comment('Código ISO del país, 3 caracteres');
            $table->string('logo')->nullable()->comment('Imagen con el logo de la comunidad');
            $table->string('observaciones')->nullable();

            $table->foreign('pais')->references('codigoISO')->on('paises');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('comunidades');
    }

}