<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function (Blueprint $table) {

            $table->id();

            $table->string('name')->comment('No se utilizará como identificador único');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->text('profile_photo_path')->nullable();
            $table->integer('MaxFreeCommunities')->default(env('APP_MAX_FREE_COMMUNITIES', 3));

            $table->timestamps();
            $table->softDeletes();

            // parte diferente
            $table->foreignId('current_team_id')->nullable();
        });
    }

}
