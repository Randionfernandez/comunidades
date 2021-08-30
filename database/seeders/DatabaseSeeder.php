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

        $this->call([
            DivisaSeeder::class,
            TiposPropiedadSeeder::class,
            PaisSeeder::class,
            ActividadSeeder::class,
            AutorizacionSeeder::class,
            ComunidadSeeder::class,
        ]);

        $admin = User::create([
                    'name' => 'Rafael',
                    'apellidos' => 'Andión',
                    'fechalta' => "2010-05-01",
                    'email' => 'randion@cifpfbmoll.eu',
                    'email_verified_at' => now(),
                    'password' => Hash::make('secretos'),
                    'remember_token' => Str::random(10),
        ]);

        $invitado = User::create([
                    'name' => 'invitado',
                    'apellidos' => 'Invitado',
                    'fechalta' => "2010-05-01",
                    'email' => 'randionfernandez@gmail.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('secretos'),
                    'remember_token' => Str::random(10),
        ]);

        \App\Models\User::factory(10)->create();

        $cu= Comunidad_User::create([
            'comunidad_id' => 1,
            'user_id' => $invitado->id,
                //  'role_id' => 2,    // Revisar cuando se sustituya por Spatie/laravel-permission
        ]);
        $cu->assignRole('Invitado');

        $comunidades = Comunidad::all();
        foreach ($comunidades as $comunidad) {
            $cu= Comunidad_User::create([
                'comunidad_id' => $comunidad->id,
                'user_id' => $admin->id,
               // 'role_id' => '2', // Revisar cuando se sustituya por Spatie/laravel-permission
            ]);
            $cu->assignRole('Admin');
        }
    }

}
