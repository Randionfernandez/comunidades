<?php

namespace Database\Factories;

use App\Models\Junta;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class JuntaFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Junta::class;


        /**
         * Define the model's default state.
         *
         * @return array
         */
        public function definition() {
            
            $usuarios = DB::table('users')->pluck('id');
            $comunidades = DB::table('comunidades')->pluck('id');
            
            return [
                'denom_convocatoria' => $this->faker->name,
                'tipo' => $this->faker->randomElement(['ordinaria', 'extraordinaria']),
                'user_id' => $this->faker->randomElement($usuarios),
                'comunidad_id' => $this->faker->randomElement($comunidades),
                'fecha_primera' => $this->faker->dateTimeBetween('-2 year'),
                'hora_primera' => now(),
                'fecha_segunda' => $this->faker->dateTimeBetween('-2 year'),
                'hora_segunda' => now(),
                'orden_dia' => $this->faker->text(),
            ];
        }

    }
