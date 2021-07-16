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
            $table->id();
<<<<<<< HEAD
            $table->string('nombre');
            $table->string('codigoISO','3');
            $table->decimal('codigoANSI',3,0)->comment('Su valor es menor de 1000. ');
            $table->timestamps();

=======
            $table->string('nombre','50');
            $table->char('codigoISO',3);
            $table->decimal('codigoANSI',3,0);
            
            $table->timestamps();
            $table->unique('codigoISO');
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