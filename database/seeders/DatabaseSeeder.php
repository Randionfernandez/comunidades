<?php

namespace Database\Seeders;

use App\Models\cuentasBancarias;
use App\Models\gastos;
use App\Models\Propietario;
use App\Models\ingresos;
use App\Models\distribucion_gastos;
use App\Models\Propiedades_User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // \App\Models\User::factory(10)->create();

    
        cuentasBancarias::factory(50)->create();
        //gastos::factory(50)->create();
        //distribucion_gastos::factory(50)->create();
        //  Propietario::factory(50)->create();
        



        /*
        $cuentasBancarias = new cuentasBancarias();

        $cuentasBancarias -> nombre = "Raul";
        $cuentasBancarias -> pais = "ES";
        $cuentasBancarias -> dc = 98;
        $cuentasBancarias -> cuenta = 33333;
        $cuentasBancarias -> bic = "SDFSFSFS";

        $cuentasBancarias -> save();
        */

        $usuarios = new Propiedades_User();
        $usuarios -> nombre = 'rafa';
        $usuarios -> propiedad = '1a';
        $usuarios -> save();

        $usuario2 = new Propiedades_User();
        $usuario2 -> nombre = 'raul';
        $usuario2 -> propiedad = '2a';
        $usuario2 -> save();

        
        $usuario3 = new Propiedades_User();
        $usuario3 -> nombre = 'fran';
        $usuario3 -> propiedad = '3a';
        $usuario3 -> save();

        $propiedades = Propiedades_User::get('propiedad');
        $nPropiedades = count($propiedades);     
        
        for ($i=0; $i < $nPropiedades ; $i++) { 
            $distribucion = new distribucion_gastos();
            $distribucion -> nombre = 'unidadRegistral';
            $distribucion -> abreviatura = 'a';
            $distribucion -> orden = '1';
            
            
            $distribucion -> propiedad = $propiedades[$i]['propiedad'];
            $distribucion -> coeficiente = 100 / $nPropiedades;
            $distribucion -> save();    
        }
        
    }
}
