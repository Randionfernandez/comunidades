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
    public function up() 
    {
        // original Randion
        Schema::create('cuentas', function (Blueprint $table) {
            $table->id();

            $table->string('iban', 25)->unique();
            $table->string('siglas', 4)->default('BBVA');
            $table->string('denominacion', 35)->default('Banco Bilbao Vizcaya Argentaria');
            $table->date('fecha_apertura');
            $table->boolean('activa')->default(true);
            $table->decimal('saldo', 8, 2)->default(0);
            $table->string('bic')->nullable();
            $table->char('divisa', 5)->default('EUR');
            $table->text('comentarios')->nullable();

            $table->unsignedBigInteger('comunidad_id');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('comunidad_id')->references('id')->on('comunidades')
                    ->onDelete('cascade');
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
