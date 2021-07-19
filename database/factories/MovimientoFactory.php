<?php

namespace Database\Factories;

use App\Models\Movimiento;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovimientoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Movimiento::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $fecha = $this->faker->dateTimeBetween('-2 year');
        
        return [
            'n_op' => 1,
            'fecha' => $fecha,
            'fechavalor' => $fecha + $this->faker->randomDigitNotZero(),
            'importe' => 1,
            'saldo' => 1,
            'concepto' => $this->faker->text(),
            'cuenta_id' => 1,
        ];
    }
}
