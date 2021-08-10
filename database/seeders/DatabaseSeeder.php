<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Cuenta;
use App\Models\Comunidad;
use App\Models\Comunidad_User;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $this->call([DivisaSeeder::class]);
        $this->call([TiposPropiedadSeeder::class]);
        $this->call([PaisSeeder::class]);
        $this->call([ActividadSeeder::class]);
        
        $user = User::create([
                    'name' => 'Rafael',
                    'apellidos' => 'Andión',
                    'fechalta' => "2010-05-01",
                    'email' => 'randion@cifpfbmoll.eu',
                    'email_verified_at' => now(),
                    'password' => Hash::make('secretos'),
                    'remember_token' => Str::random(10),
        ]);

        \App\Models\User::factory(15)->create();
        $this->call([ComunidadSeeder::class]);

        Comunidad_User::create([
            'comunidad_id' => 1,
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $comunidades = Comunidad::all();
        foreach ($comunidades as $comunidad) {
            Comunidad_User::create([
                'comunidad_id' => $comunidad->id,
                'user_id' => $user->id
            ]);
        }
    }

}