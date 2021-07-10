<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentasBancariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Integracion parte de Rafa Maya para que cuadre la integración
        Schema::create('cuentas_bancarias', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('pais_id');
            $table->integer('dc');
            $table->string('cuenta');
            $table->string('bic');
            $table->timestamps();
            
            $table->foreign('pais_id')->references('id')->on('paises');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuentas_bancarias');
    }
}
