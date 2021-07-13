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
        
        $provincia = $this->faker->randomElement(DB::table('provincias')->get());
        $comunidadAutonoma = DB::table('comunidades_autonomas')->get()[$provincia->comunidadAutonoma_id-1];
        
        return [
            'cif' => $this->faker->unique()->dni(),
            'denom' => 'C.P. ' . $this->faker->name,
            'fechalta' => $this->faker->dateTimeBetween('-2 year'),
            'direccion' => $this->faker->streetAddress(), //secondaryAddress(),
            'partes' => $this->faker->randomDigitNot(0),
            'pais' => $comunidadAutonoma->pais,
            'localidad' => $comunidadAutonoma->id,
            'provincia' => $provincia->id,
            'cp' => '07' . $this->faker->randomNumber(3, true),
        ];
    }

}
