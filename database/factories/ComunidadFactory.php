<?php

namespace Database\Factories;

use App\Models\Comunidad;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

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
        
        $comunidadesAutonomas = DB::table('comunidades_autonomas')->pluck('id');
        $provincias = DB::table('provincias')->pluck('id');
        
        return [
            'cif' => $this->faker->unique()->dni(),
            'denom' => 'C.P. ' . $this->faker->name,
            'fechalta' => $this->faker->dateTimeBetween('-2 year'),
            'direccion' => $this->faker->streetAddress(), //secondaryAddress(),
            'partes' => $this->faker->randomDigitNot(0),
            'localidad' => $this->faker->randomElement($comunidadesAutonomas),
            'provincia' => $this->faker->randomElement($provincias),
            'cp' => '07' . $this->faker->randomNumber(3, true),
        ];
    }

}
