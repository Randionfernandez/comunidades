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
            $table->timestamps();
            $table->softDeletes();
            
            $table->integer('n_op')->comment('Número de operación, a veces no esta disponible, depende de la cuenta y de los listados');
            $table->date('fecha');
            $table->date('fechavalor')->comment('Si no se conoce, su valor se copia del campo fecha');
            $table->decimal('importe', 10, 2);
            $table->decimal('saldo', 10, 2)->comment('Saldo resultante después de aplicar este movimiento. Solo informativo, sirve para comprobaciones');
            $table->string('concepto', 70);
            $table->boolean('contabilizado')->default('false');

            $table->unsignedBigInteger('user_id')->nullable()->comment('Identifica al usuario que creó o editó el movimiento. Posteriormente no será nullable');
            $table->unsignedBigInteger('cuenta_id');

            $table->foreign('user_id')->references('id')->on('users')
                    ->onUpdate('cascade');
            $table->foreign('cuenta_id')->references('id')->on('cuentas')
                    ->onUpdate('cascade')->onDelete('cascade');

            $table->unique(['cuenta_id', 'n_op']);
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