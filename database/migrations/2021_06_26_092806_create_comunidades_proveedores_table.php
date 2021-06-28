<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateComunidadesProveedoresTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        // Integracion parte de Sixto para que cuadre la integración
        Schema::create('comunidades_proveedores', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('comunidad_id');
            $table->unsignedBigInteger('proveedor_id');

            $table->foreign('comunidad_id')->references('id')->on('comunidades')
                    ->onDelete('cascade');

            $table->foreign('proveedor_id')->references('id')->on('proveedores')
                    ->onDelete('cascade');

            $table->index(['comunidad_id', 'proveedor_id']);

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
        Schema::dropIfExists('comunidades_proveedores');
    }

}
