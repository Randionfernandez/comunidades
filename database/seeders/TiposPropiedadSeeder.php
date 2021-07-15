<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposPropiedadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_propiedad')->insert([
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
            
        ]);
    }
}
