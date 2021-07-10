<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Comunidad;
use App\Models\ComunidadUser;

class DatabaseSeeder extends Seeder {

/**
 * Seed the application's database.
 *
 * @return void
 */
    public function run() {

        $user = User::create([
            'name' => 'randion',
            'email' => 'randion@cifpfbmoll.eu',
            'email_verified_at' => now(),
            'password' => Hash::make('secretos'),
            'remember_token' => Str::random(10),
        ]);

        $this->call([RoleSeeder::class]);
        $this->call([PaisSeeder::class]);
        $this->call([ComunidadAutonomaSeeder::class]);
        $this->call([ProvinciaSeeder::class]);
        \App\Models\User::factory(15)->create();
        $this->call([ComunidadSeeder::class]);
        $this->call([JuntaSeeder::class]);
        $this->call([TipoPropiedadSeeder::class]);
        $this->call([PropiedadSeeder::class]);

        ComunidadUser::create([
            'comunidad_id' => 1,
            'user_id' => 2,
            'role_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        //ComunidadUser::factory(15)->create();
        //$this->call([ComunidadUserSeeder::class]);
        $this->call(TipoGastoSeeder::class);
        $this->call(FiguraSeeder::class);
        $this->call(CalificacionSeeder::class);
        $this->call([ProveedorSeeder::class]);
        $this->call([ComunidadProveedorSeeder::class]);
        $this->call([CuentaBancariaSeeder::class]);
        
        $miscomunidades = Comunidad::all();
        
        foreach ($miscomunidades as $comunidad) {
            ComunidadUser::create([
                'comunidad_id' => $comunidad->id,
                'user_id' => $user->id,
                'role_id' => '2'
            ]);
        }
    }
}