<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Provincia;

class ProvinciaSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $provincias = [
            [17, 'Alava'], [6, 'Albacete'], [9, 'Alicante'],
            [1, 'Almería'], [18, 'Asturias'], [5, 'Avila'],
            [11, 'Badajoz'], [7, 'Barcelona'], [5, 'Burgos'],
            [11, 'Cáceres'], [1, 'Cádiz'], [4, 'Cantabria'],
            [9, 'Castellón'], [8, 'Ceuta'], [6, 'Ciudad Real'],
            [1, 'Córdoba'], [12, 'La Coruña'], [6, 'Cuenca'],
            [7, 'Gerona'], [1, 'Granada'], [6, 'Guadalajara'],
            [17, 'Guipúzcoa'], [1, 'Huelva'], [2, 'Huesca'],
            [13, 'Islas Baleares'], [1, 'Jaén'], [5, 'León'],
            [7, 'Lérida'], [12, 'Lugo'], [10, 'Madrid'],
            [1, 'Málaga'], [15, 'Melilla'], [19, 'Murcia'],
            [16, 'Navarra'], [12, 'Orense'], [5, 'Palencia'],
            [3, 'Las Palmas'], [12, 'Pontevedra'], [14, 'La Rioja'],
            [5, 'Salamanca'], [5, 'Segovia'], [1, 'Sevilla'],
            [5, 'Soria'], [7, 'Tarragona'],
            [3, 'Santa Cruz de Tenerife'], [2, 'Teruel'],
            [6, 'Toledo'], [9, 'Valencia'], [5, 'Valladolid'],
            [17, 'Vizcaya'], [5, 'Zamora'], [2, 'Zaragoza']
        ];

        foreach ($provincias as $provincia) {
            Provincia::create([
                'comunidadAutonoma_id' => $provincia[0],
                'nombreProvincia' => $provincia[1],
            ]);
        }
    }

}
