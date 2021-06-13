<?php

namespace Database\Factories;

use App\Models\gastos;
use Illuminate\Database\Eloquent\Factories\Factory;

class gastosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = gastos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "descripcion" => $this -> faker -> sentence(),
            "proveedor" => $this -> faker -> company(),
            "fecha" => $this -> faker -> date(),
            "importe" => $this -> faker -> numberBetween(100,20000)
        ];
    }
}
