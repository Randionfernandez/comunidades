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
            ['codigo' => 'NOC', 'descripcion' => 'No consta'],
            ['codigo' => 'APT', 'descripcion' => 'Apartamento'],
            ['codigo' => 'DUP', 'descripcion' => 'Dúplex'],
            ['codigo' => 'VIV', 'descripcion' => 'Vivienda'],
            ['codigo' => 'ATC', 'descripcion' => 'Ático'],
            ['codigo' => 'PAR', 'descripcion' => 'Pareado'],
            ['codigo' => 'LOC', 'descripcion' => 'Local comercial'],
            ['codigo' => 'GAR', 'descripcion' => 'Plaza de garaje'],
            ['codigo' => 'TRAS', 'descripcion' => 'Trastero'],
            ['codigo' => 'CHA', 'descripcion' => 'Casa Unifamiliar'],
            ['codigo' => 'DES', 'descripcion' => 'Despacho'],
        ];

        foreach ($tiposPropiedades as $tipoPropiedad) {
            TipoPropiedad::create([
                'abreviatura' => $tipoPropiedad[0],
                'nombre' => $tipoPropiedad[1]
            ]);
        }
    }
}
