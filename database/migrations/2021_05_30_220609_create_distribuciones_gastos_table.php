<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistribucionesGastosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distribuciones_gastos', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('propiedad_id');
            $table->decimal('coeficiente');
            $table->decimal('unidadRegistral')->nullable();
            $table->string('name');
            $table->string('abreviatura');
            $table->integer('orden');
            
            $table->timestamps();
            
            $table->foreign('propiedad_id')->references('id')->on('propiedades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('distribuciones_gastos');
    }
}
