<?php

namespace Database\Factories;

use App\Models\Comunidad;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComunidadFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comunidad::class;


        /**
         * Define the model's default state.
         *
         * @return array
         */
        public function definition() {
            return [
                'cif' => $this->faker->unique()->dni(),
                'denom' => 'C.P. ' . substr($this->faker->name, 0, 30),  // denom: máximo 35 char
                'fechalta' => $this->faker->dateTimeBetween('-2 year'),
                'direccion' => '"' . $this->faker->streetAddress() . '"', //secondaryAddress(),
                'localidad' => $this->faker->asciify(),
                'provincia' => $this->faker->community(),
                'cp' => '07' . $this->faker->randomNumber(3, true),
                'pais'=>'ESP',
                'observaciones' => $this->faker->text()
            ];
        }

    }