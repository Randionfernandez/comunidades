<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComunidadesAutonomasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comunidades_autonomas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pais_id');
            $table->string('nombreComunidadAutonoma');
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('pais_id')->references('id')->on('paises')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comunidades_autonomas');
    }
}
