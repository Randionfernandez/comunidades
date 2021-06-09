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
        
        $provincias = ['Alava','Albacete','Alicante','Almería','Asturias',
            'Avila','Badajoz','Barcelona','Burgos','Cáceres', 'Cádiz',
            'Cantabria','Castellón','Ciudad Real','Córdoba','La Coruña',
            'Cuenca','Gerona','Granada','Guadalajara', 'Guipúzcoa','Huelva',
            'Huesca','Islas Baleares','Jaén','León','Lérida','Lugo','Madrid',
            'Málaga','Murcia','Navarra', 'Orense','Palencia','Las Palmas',
            'Pontevedra','La Rioja','Salamanca','Segovia','Sevilla','Soria',
            'Tarragona', 'Santa Cruz de Tenerife','Teruel','Toledo','Valencia',
            'Valladolid','Vizcaya','Zamora','Zaragoza'];

        foreach ($provincias as $provincia) {
            Provincia::create([
                'nombreProvincia' => $provincia,
            ]);
        }
    }

}
