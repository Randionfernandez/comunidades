<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comunidad;
use App\Models\Cuenta;

class ComunidadSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        Comunidad::factory()
                ->has(Cuenta::factory()->count(1))
          //      ->has(Propiedad::factory()->count(10))
                ->count(15)
                ->create();
    }

}
            