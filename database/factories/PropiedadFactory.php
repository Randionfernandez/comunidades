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
        $comunidades = DB::table('comunidades')->pluck('id');
        $users = DB::table('users')->pluck('id');
        $tiposPropiedades = DB::table('tipos_propiedades')->pluck('id');
        
        return [
            "denominacion" => $this->faker->numberBetween($min = 1, $max = 20) . strtoupper($this->faker->randomLetter),
            "user_id" => $this->faker->randomElement($users),
            "comunidad_id" => $this->faker->randomElement($comunidades),
            "tipo_id" => $this->faker->randomElement($tiposPropiedades),
            "parte" => $this->faker->randomDigitNot(0),
            "coeficiente" => $this->faker->randomDigitNot(0),
            "observaciones" => $this->faker->text(20)
        ];
    }
}
