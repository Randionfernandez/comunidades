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
            // $table->calificacion   enum pesimo mala normal buena excelente
            $table->unsignedBigInteger('calificacion');

            // $table->figura   enum fisica juridica
            $table->unsignedBigInteger('figura');

            $table->string('nombre');
            $table->string('apellido1')->nullable();
            $table->string('apellido2')->nullable();
            $table->string('email')->unique();
            $table->bigInteger('telefono');
            $table->string('calle')->nullable();
            $table->integer('codigopais');
            $table->string('cp');
            $table->unsignedBigInteger('pais');
            $table->unsignedBigInteger('localidad');
            $table->unsignedBigInteger('provincia');
            $table->string('iban');
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('tipoGasto')->references('id')->on('tipos_gastos')->onDelete('cascade');
            $table->foreign('calificacion')->references('id')->on('calificaciones')->onDelete('cascade');
            $table->foreign('figura')->references('id')->on('figuras')->onDelete('cascade');
            $table->foreign('pais')->references('id')->on('paises')->onDelete('cascade');
            $table->foreign('localidad')->references('id')->on('comunidades_autonomas')->onDelete('cascade');
            $table->foreign('provincia')->references('id')->on('provincias')->onDelete('cascade');
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
