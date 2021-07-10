<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimientosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id();
            $table->softDeletes();
            $table->timestamps();
            
            $table->integer('n_op')->comment('Número de operación, a veces no esta disponible, depende de la cuenta y de loslistados');
            $table->date('fecha');
            $table->date('fechavalor')->comment('Si no se conoce, se repite coincidiendo con el valor del campo fecha');
            $table->decimal('importe', 8, 2);
            $table->decimal('saldo', 8, 2)->comment('Solo informativo, sirve para comprobaciones');
            $table->string('concepto', 50);

            // (pendiente) propiedad, mov, siglas, comunidad_id
            
            

            $table->unsignedBigInteger('cuenta_id');

            $table->foreign('cuenta_id')->references('id')->on('cuentas')
                    ->onUpdate('cascade')->onDelete('cascade');
            
            $table->index(['cuenta_id','n_op']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('movimientos');
    }

}