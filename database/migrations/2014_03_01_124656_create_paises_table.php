<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paises', function (Blueprint $table) {
<<<<<<< HEAD:database/migrations/2014_03_01_124656_create_paises_table.php
            $table->char('codigoISO',3)->primary();
            $table->decimal('codigoANSI','3','0');
=======
            $table->id();
<<<<<<< HEAD
            $table->string('nombre');
            $table->string('codigoISO','3');
            $table->decimal('codigoANSI',3,0)->comment('Su valor es menor de 1000. ');
            $table->timestamps();

=======
>>>>>>> 480e0a25763c3e796ea0035d616d3a457377a7f7:database/migrations/2021_03_01_124656_create_paises_table.php
            $table->string('nombre','50');

            $table->unique('codigoANSI');
>>>>>>> c4e5f520d6fa6d9bc9914a643a82cd2e2fe89654
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paises');
    }
}