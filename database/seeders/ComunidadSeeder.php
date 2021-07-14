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
                ->count(20)
                ->create();
    }

}
