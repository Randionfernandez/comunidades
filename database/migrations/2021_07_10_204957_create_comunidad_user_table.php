<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComunidadUserTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('comunidad_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('comunidad_id')->constrained('comunidades')
                    ->onDelete('cascade');
            $table->foreignId('user_id')->constrained()
                    ->onDelete('cascade');
            // Suprimida referencia con role, por incompatibilidad al instalar el
            // paquete spatie/laravel-permission.
            // //////////////       Modificar esta parte
//            $table->foreignId('role_id')->constrained()
//                    ->onUpdate('cascade');

            $table->unique(['comunidad_id', 'user_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('comunidad_user');
    }

}