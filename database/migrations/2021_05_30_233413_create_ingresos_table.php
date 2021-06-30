<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngresosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        // original Randion
        
        /*
         * Schema::create('ingresos', function (Blueprint $table) {
            $table->id();
         * 
         * $table->timestamps();
            $table->softDeletes();
         */
        
        // Implementacion de parte de Rafa Maya
        
        Schema::create('ingresos', function (Blueprint $table) {
            $table->id();
            
            $table->date('fecha');
            $table->double('cantidad');
            $table->unsignedBigInteger('cuenta_id')->nullable();
            $table->string('cuenta');
            $table -> string('Propietario');
            $table -> unsignedBigInteger('user_id')->nullable();

            $table->foreign('cuenta_id')
            ->references('id')->on('cuentas_bancarias')
            ->onDelete('set null');

            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('set null');
            
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
        Schema::dropIfExists('ingresos');
    }

}
