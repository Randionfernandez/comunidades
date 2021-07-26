<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComunidadProveedorTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('comunidad_proveedor', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('comunidad_id')->constrained('comunidades')
                    ->onDelete('cascade');
            $table->foreignId('proveedor_id')->constrained('proveedores')->comment('onDelete debería asignar un valor que informase de la relación rota, p.e., "Elliminado"');

            $table->unique(['comunidad_id', 'proveedor_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('comunidad_proveedor');
    }

}