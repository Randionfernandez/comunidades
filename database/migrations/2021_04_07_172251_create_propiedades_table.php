<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropiedadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propiedades', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('comunidad_id');
            $table->unsignedBigInteger('user_id')->nullable();  // Solo consideramos un propietario por propiedad
            $table->string('denominacion',10)->comment("Nombre por el que se conoce la parte, p.e., 1 izda. Ent-B, etc.");
            $table->integer('parte')->comment("Cada una de las partes que componen la comunidad, según registro de la propiedad");
            $table->decimal('coeficiente',5,2)->comment("Porcentaje de participación en el total de la comunidad, según registro de la propiedad");

          // posiblemente se enlace con una entidad 'tipo_propiedad' para controlar el dominio de valores
            $table->enum('tipo',['local','piso','atico'])->comment("Tipo de propiedad: piso, ático, local,...");
            $table->string('observaciones')->nullable();
            

            $table->foreign('user_id')->references('id')->on('users');
            
            $table->foreign('comunidad_id')->references('id')->on('comunidades')
                    ->onDelete('cascade');
            
            $table->unique(['comunidad_id','parte']);
            $table->unique(['comunidad_id','denominacion']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('propiedades');
    }
}