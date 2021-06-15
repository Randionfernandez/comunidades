<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Seeder\UserSeeder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
// use Spatie\Permission\Traits\HasRoles;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     // \App\Models\User::factory(10)->create();
    	// $user=User::factory()->create([
    	// 	'name'=>'Inés',
    	// 	'email'=>'igolpe@cifpfbmoll.eu',
    	// ]);
     *
     * @return void
     */
    public function run()
    {
        $user=new User();
        $user= User::create([
            'name' => 'randion',
            'email' => 'randion@cifpfbmoll.eu',
            'nif' => '000000001',
            'role'=>'admin',
            'email_verified_at' => now(),
            'password' => Hash::make('secretos'),
            'remember_token' => Str::random(10),
        ]);


    // $user=User::create([
    //     'name' => 'ines',
    //     'nif' => '12345678b',
    //     'role'=>'admin',
    //     'email' =>'igolpe@cifpfbmoll.eu',
    //     'email_verified_at' => now(),
    //     'password' => Hash::make('123456789'),
    //     'remember_token' => Str::random(10),
    //  ]);

    //  $this->call([RoleSeeder::class]);
    //  \App\Models\User::factory(15)->create();
    // $this->call([ComunidadSeeder::class]);

    //     Comunidad_User::create([
    //         'comunidad_id' => 1,
    //         'user_id' => 2,
    //         'role_id' => 2,
    //         'created_at' => now(),
    //         'updated_at' => now()
    //     ]);


    }
}