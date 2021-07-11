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
            $table->unsignedBigInteger('pais');
            $table->string('nombre');
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('pais')->references('id')->on('paises')->onDelete('cascade');
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
