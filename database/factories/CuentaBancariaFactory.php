<?php

namespace Database\Factories;

use App\Models\CuentaBancaria;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

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
        $paises = DB::table('paises')->pluck('id');
        
        return [
            "nombre"  => 'Banca ' . $this->faker->lastname(),
            //"pais" => $this->faker->countryCode(),
            "pais" => $this->faker->randomElement($paises),
            "dc" => $this->faker->numberBetween(10,90),
            "cuenta" => $this->faker->bankAccountNumber(),
            "bic" => $this->faker->swiftBicNumber()
        ];
    }
}
