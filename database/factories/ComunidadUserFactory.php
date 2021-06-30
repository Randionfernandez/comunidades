<?php

namespace Database\Factories;

use App\Models\ComunidadUser;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class ComunidadUserFactory extends Factory {

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ComunidadUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        
        $comunidades = DB::table('comunidades')->pluck('id');
        $users = DB::table('users')->pluck('id');
        $role = DB::table('roles')->pluck('id');
        
        return [
            'comunidad_id' => $this->faker->randomElement($comunidades),
            'user_id' => $this->faker->randomElement($users),
            'role_id' => $this->faker->randomElements($role),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }

}
