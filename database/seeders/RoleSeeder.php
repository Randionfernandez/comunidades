<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {


        Role::create([
            'role' => 'super',
            'descripcion' => 'Super',
        ]);
        
        Role::create([
            'role' => 'admin',
            'descripcion' => 'Admin',
        ]);
        
        Role::create([
            'role' => 'guest',
            'descripcion' => 'guest',
        ]);
    }

}