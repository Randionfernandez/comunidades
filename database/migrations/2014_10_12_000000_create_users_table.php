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
            $table->id();
            $table->string('name');
            $table->string('apellido1')->nullable();
            $table->string('apellido2')->nullable();
            $table->string('nif')->unique();
            $table->string('telefono')->nullable();
            $table->string('calle', 30)->nullable();
            $table->string('portal', 4)->nullable();
            $table->string('bloque', 4)->nullable();
            $table->string('escalera', 4)->nullable();
            $table->string('piso', 4)->nullable();
            $table->string('puerta', 4)->nullable();
            $table->string('cod_pais', 2)->nullable();
            $table->string('cp', 5)->nullable();
            $table->string('pais', 20)->nullable();
            $table->string('provincia', 20)->nullable();
            $table->string('localidad', 20)->nullable();
            // $table->string('role');
            $table->enum('role',['admin','invitado'])->comment("Tipo de rol según la gestión:...");
            $table->unsignedBigInteger('num_cta')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            // $table->timestamp('updated_at');
            // $table->timestamps();

            $table->string('password');
            $table->rememberToken();

             // $table->integer('limitMaxFreeCommunities')->default(env('APP_LIMIT_MAX_FREE_COMMUNITIES'));
            $table->foreignId('propiedad_id')->nullable();
            // $table->foreignId('current_team_id')->nullable();
            // $table->text('profile_photo_path')->nullable();

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
