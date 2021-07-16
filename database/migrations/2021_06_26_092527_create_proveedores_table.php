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
        // Integracion parte de Sixto Vera para que cuadre la integración
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id();
            $table->date('fechalta');
            $table->string('cif', 9)->unique();

            // $table->tipo  enum , y en la vista
            $table->unsignedBigInteger('tipoGasto');

            $table->string('nombre');
            $table->string('apellido1')->nullable();
            $table->string('apellido2')->nullable();
            $table->string('email')->unique();
            $table->string('telefono');
            $table->string('calle')->nullable();
            $table->integer('codigopais');
            $table->string('cp');
            $table->unsignedBigInteger('pais');
            $table->string('localidad');
            $table->string('provincia');
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('tipoGasto')->references('id')->on('tipos_gastos')->onDelete('cascade');
            $table->foreign('pais')->references('id')->on('paises')->onDelete('cascade');
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
