<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('cuentas', function (Blueprint $table) {
            $table->id();

            $table->char('iban', 24)->unique();
            $table->char('siglas', 4)->default('BBVA');
            $table->string('denominacion', 35)->default('Banco Bilbao Vizcaya Argentaria');
            $table->date('fecha_apertura')->comment('Fecha de apertura o la del movimiento más antiguo, si se desconociese la de apertura');
            $table->boolean('activa')->default(true)->comment('Activa == true, si admite nuevos movimientos');
            $table->decimal('saldo', 10, 2)->default(0)->comment('Un trigger actualizará este dato, con cada movimiento. Especial cuidado con actualizaciones y borrados');
            $table->string('bic')->nullable();
            $table->char('divisa', 3)->default('EUR')->comment('Código ISO 4217 de la divisa');
            $table->text('comentarios')->nullable();

            $table->unsignedBigInteger('comunidad_id');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('comunidad_id')->references('id')->on('comunidades')
                    ->onDelete('cascade');
            
            $table->foreign('divisa')->references('codigo')->on('divisas')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('cuentas');
    }

}