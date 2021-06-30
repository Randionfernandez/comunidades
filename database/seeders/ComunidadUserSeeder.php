<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ComunidadUser;

class ComunidadUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ComunidadUser::factory()
                ->count(15)
                ->create();
    }
}
