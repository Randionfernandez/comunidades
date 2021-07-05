<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGastosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        // original Randion
        Schema::create('gastos', function (Blueprint $table) {
            $table->id();
            
            $table->timestamps();    
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('gastos');
    }

}
