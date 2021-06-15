<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


    //   $user= User::create([
    //     'name' => 'randion',
    //     'email' => 'randion@cifpfbmoll.eu',
    //     'nif' => '000000000',
    //     'email_verified_at' => now(),
    //     'password' => Hash::make('secretos'),
    //     'remember_token' => Str::random(10),
    // ]);
    //   $user=User::create([
    //     'name' => 'ines',
    //     'nif' => '123456789',
    //     'email' =>'igolpe@cifpfbmoll.eu',
    //     'email_verified_at' => now(),
    //     'password' => Hash::make('123456789'),
    //     'remember_token' => Str::random(10),
    // ]);
   \App\Models\User::factory(15)->create();
  }
}
