<?php

namespace Database\Factories;

use App\Models\Propiedad;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class PropiedadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Propiedad::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        $comunidad = $this->faker->randomElement(DB::table('comunidades')->pluck('id'));
        $usuario = $this->faker->randomElement(DB::table('users')->pluck('id'));
        
        return [
            'comunidad_id' => $comunidad,
            'user_id' => $usuario,
            'denominacion' => $this->faker->randomDigitNotZero() . $this->faker->randomLetter(),
            'parte' => $this->faker->randomDigitNotZero(),
            'coeficiente' => $this->faker->randomDigitNotZero(),
            'tipo' => 'local',
            'observaciones' => $this->faker->text()
        ];
    }
}