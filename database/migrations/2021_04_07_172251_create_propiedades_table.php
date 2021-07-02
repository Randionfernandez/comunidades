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
        // original Randion
        Schema::create('propiedades', function (Blueprint $table) {
            // Original de Randion
            
            $table->id();
            
            $table->string('name');
            $table->unsignedBigInteger('comunidad_id');
            $table->unsignedBigInteger('user_id')->nullable();  // Solo consideramos un propietario por propiedad
            $table->integer('parte')->comment("Cada una de las partes que componen la comunidad, según registro de la propiedad");
            $table->integer('coeficiente')->comment("Porcentage de participación en el total de la comunidad, según registro de la propiedad");
          // posiblemente se enlace con una entidad 'tipo_propiedad' para controlar el dominio de valores
            $table->unsignedBigInteger('tipoPropiedad')->comment("Tipo de propiedad: piso, ático, local,...");
            $table->string('observaciones')->nullable();
            
            $table->timestamps();
            $table->softDeletes();            

            $table->foreign('user_id')->references('id')->on('users');
                        
            $table->foreign('comunidad_id')->references('id')->on('comunidades')
                    ->onDelete('cascade');
            
            $table->foreign('tipoPropiedad')->references('id')->on('tipos_propiedades')->onDelete('cascade');
            
            $table->index(['comunidad_id','parte']);
             
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