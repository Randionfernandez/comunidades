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
            $table->string('apellido1');
            $table->string('apellido2');
            $table->string('nif')->unique();
            $table->string('telefono')->nullable();
            // $table->string('role');
            $table->enum('role',['admin','invitado'])->comment("Tipo de rol según la gestión:...");
            $table->unsignedBigInteger('num_cta');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            // $table->timestamp('updated_at');
            $table->timestamps();

            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
            // $table->integer('limitMaxFreeCommunities')->default(env('APP_LIMIT_MAX_FREE_COMMUNITIES'));$table->timestamps();
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
