<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('name');
            $table->string('apellido1')->nullable();
            $table->string('apellido2')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            // $table->string('tipo')->nullable();
            // $table->string('fecha')->nullable();
            $table->string('nif')->unique()->nullable();
            $table->string('telefono')->nullable();
            $table->string('calle')->nullable();
            $table->string('portal')->nullable();
            $table->string('bloque')->nullable();
            $table->string('escalera')->nullable();
            $table->string('piso')->nullable();
            $table->string('puerta')->nullable();
            $table->string('codigo_pais')->nullable();
            $table->string('cp')->nullable();
            $table->string('pais')->nullable();
            $table->string('provincia')->nullable();
            $table->string('localidad')->nullable();
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
            $table->integer('limitMaxFreeCommunities')->default(env('APP_LIMIT_MAX_FREE_COMMUNITIES'));

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
