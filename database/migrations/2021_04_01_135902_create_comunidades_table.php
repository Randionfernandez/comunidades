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
            $table->boolean('activa')->default(true)->comment('Si no está activa, no se pueden realizar operaciones sobre esta comunidad');
            $table->boolean('gratuita')->default(true)->comment('Indica si esta comnidad es de pago o gratuita');  
            $table->integer('partes')->default(10)->comment('Cantidad de unidades registrales que componen la comunidad');
            $table->string('denom', 35);
            $table->string('direccion', 40);
            $table->string('localidad', 35)->nullable();
            $table->string('provincia')->nullable();
            $table->char('cp', 5)->comment('Código postal');
            //$table->string('pais')->default('ES');
            $table->string('logo')->nullable()->comment('Imagen con el logo de la comunidad');
            $table->string('observaciones')->nullable();

            $table->timestamps();
            $table->softDeletes();
            
            // parte diferente
            
            $table->unsignedBigInteger('pais')->default(1);
            
            $table->foreign('pais')->references('id')->on('paises');
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
