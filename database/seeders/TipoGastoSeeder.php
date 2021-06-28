<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoGasto;

class TipoGastoSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $tiposGastos = [
            'Ingreso' ,'Admin. Públic', 'Alcantarillado', 'Agua', 'Antenas', 'Antiplaga', 
            'Ascensores', 'Basuras', 'Comunidad', 'Desatascos', 'Electricidad', 
            'Entidades Financiearas', 'Fontanería', 'Gas', 'Impermeabilizaciones', 
            'Jardinería', 'Mantenimiento', 'Profesionales', 'Limpieza', 
            'Piscinas', 'Porteros automáticos', 'Garajes', 'Rehabilitación', 
            'Seguros', 'Telefonía'
        ];

        foreach ($tiposGastos as $tipoGasto) {
            TipoGasto::create([
                'nombreTipoGasto' => $tipoGasto,
            ]);
        }
    }

}
