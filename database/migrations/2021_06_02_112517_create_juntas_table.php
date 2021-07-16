<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJuntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Integracion parte de Ricardo para que cuadre la integración
        Schema::create('juntas', function (Blueprint $table) {
            $table->id();
            $table->string('denominacion');
            $table->enum('tipo', ['ordinaria', 'extraordinaria']);
            $table->unsignedBigInteger('user_id'); // convocante
            $table->unsignedBigInteger('comunidad_id'); // comunidad que pertenece la convocatoria
            $table->date('fechaprimera');
            $table->time('horaprimera');
            $table->date('fechasegunda');
            $table->time('horasegunda');
            $table->text('ordendia'); // orden del dia
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('comunidad_id')->references('id')->on('comunidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('juntas');
    }
}