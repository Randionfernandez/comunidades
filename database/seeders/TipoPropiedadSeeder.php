<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TipoPropiedadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        
        $tiposPropiedades = [
            ['AP','Apartamento'], ['CA','Casa'], ['CH','Chalet'], 
            ['DS','Despacho'], ['DP','Dúplex'], ['LC','Local Comercial'], 
            ['PS','Piso'], ['PG','Plaza de Garaje'], ['TR','Trastero'], 
            ['VI','Vivienda'], ['AT','Ático']
        ];

        foreach ($tiposPropiedades as $tipoPropiedad) {
            \App\Models\TipoPropiedad::create([
                'abreviaturaTipoPropiedad' => $tipoPropiedad[0],
                'nombreTipoPropiedad' => $tipoPropiedad[1]
            ]);
        }
    }
}
