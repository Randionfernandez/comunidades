<?php

namespace Database\Factories;

use App\Models\ingresos;
use Illuminate\Database\Eloquent\Factories\Factory;

class IngresoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ingresos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "fecha" => $this -> faker -> now(),
            "cantidad" => $this -> faker -> randomDigitNotNull(),
            "cuenta" ,
            "Propietario"
        ];
    }
}
