<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoPropiedad;

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
            TipoPropiedad::create([
                'abreviatura' => $tipoPropiedad[0],
                'nombre' => $tipoPropiedad[1]
            ]);
        }
    }
}
