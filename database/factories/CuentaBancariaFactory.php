<?php

namespace Database\Factories;

use App\Models\CuentaBancaria;
use Illuminate\Database\Eloquent\Factories\Factory;

class CuentaBancariaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CuentaBancaria::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "nombre"  => $this -> faker->name(),
            //"pais" => $this -> faker -> countryCode(),
            "pais" => '1',
            "dc" => $this -> faker -> numberBetween(10,90),
            "cuenta" => $this -> faker -> bankAccountNumber(),
            "bic" => $this -> faker -> swiftBicNumber()
        ];
    }
}
