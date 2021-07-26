<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDivisasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('divisas', function (Blueprint $table) {
            $table->char('codigo', 3)->primary()->default('EUR')->comment('Código ISO-4217 de la divisa');
            $table->string('nombre', 32)->default('Euro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('divisas');
    }

}