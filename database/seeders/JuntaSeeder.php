<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Junta;

class JuntaSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Junta::factory()
                ->count(15)
                ->create();
    }

}
