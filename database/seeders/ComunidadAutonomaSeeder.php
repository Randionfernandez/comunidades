<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ComunidadAutonoma;

class ComunidadAutonomaSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $comunidadesAutonomas = [
            'Andalucía', 'Aragón', 'Canarias', 'Cantabria',
            'Castilla y León', 'Castilla-La Mancha', 'Cataluña', 'Ceuta',
            'Comunidad Valenciana', 'Comunidad de Madrid', 'Extremadura',
            'Galicia', 'Islas Baleares', 'La Rioja', 'Melilla', 'Navarra',
            'País Vasco', 'Principado de Asturias', 'Región de Murcia'
        ];

        foreach ($comunidadesAutonomas as $comunidadAutonoma) {
            ComunidadAutonoma::create([
                'pais' => 1,
                'nombre' => $comunidadAutonoma,
            ]);
        }
    }

}
