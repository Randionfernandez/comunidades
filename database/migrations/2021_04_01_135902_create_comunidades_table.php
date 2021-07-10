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
    public function up() 
    {
        // original Randion
        Schema::create('comunidades', function (Blueprint $table) {
            
            $table->id();

            $table->string('cif', 9)->unique();
            $table->date('fechalta');
            $table->boolean('activa')->default(true);
            $table->boolean('gratuita')->default(true);
            $table->integer('partes')->default(10)->comment('Cantidad de unidades registrales que componen la comunidad');
            $table->string('denom', 60);
            $table->string('direccion', 60);
            $table->string('localidad', 35)->nullable();
            $table->string('provincia')->nullable();
            $table->char('cp', 5)->comment('Código postal');
            $table->unsignedBigInteger('pais_id')->default(1);
            $table->string('logo')->nullable()->comment('Imagen con el logo de la comunidad');
            $table->string('observaciones')->nullable();

            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('pais_id')->references('id')->on('paises');
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
