<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PropiedadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            public function run()
    {
        Propiedad::factory()
                ->count(20)
                ->create();
    }
    }
}
