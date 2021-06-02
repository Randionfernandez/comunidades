<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComunidadUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('comunidad_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('comunidad_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('role_id');

            $table->foreign('comunidad_id')->references('id')->on('comunidades')
                    ->onDelete('cascade');

            $table->foreign('user_id')->references('id')->on('users')
                    ->onDelete('cascade');

            $table->foreign('role_id')->references('id')->on('roles')
                    ->onDelete('cascade');

            $table->index(['comunidad_id', 'user_id']);
        
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
