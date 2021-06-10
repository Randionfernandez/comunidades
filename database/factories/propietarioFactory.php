<?php

namespace Database\Factories;

use App\Models\Propietario;
use Illuminate\Database\Eloquent\Factories\Factory;

class propietarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = propietario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [        
            'Tratamiento' => $this -> faker -> randomElement(['Sr','Sra']),
            'Nombre' => $this -> faker -> name(),
            'Apellido1' => $this -> faker -> firstName(),
            'Apellido2' => $this -> faker -> lastName(),
            'Tipo' => $this -> faker -> randomElement(['Fisica','Juridica']),
            'Fecha' => $this -> faker -> date(),
            'DNI' => $this -> faker-> dni(),
            'Email' => $this -> faker -> email(),
            'Telefono' => $this -> faker -> mobileNumber(),
            'Calle' => $this -> faker -> streetAddress(),
            'Portal' => $this -> faker ->  randomDigitNotNull() ,
            'Bloque' => $this -> faker ->  randomDigitNotNull(),
            'Escalera'=> $this -> faker -> randomDigitNotNull(),
            'Piso' => $this -> faker -> randomDigitNotNull() ,
            'Puerta' => $this -> faker -> randomLetter(),
            'Codigo_pais' => $this -> faker ->countryCode(),
            'CP' => $this -> faker -> postcode(),
            'Pais' => $this -> faker -> country(),
            'Provincia' => $this -> faker -> state(),
            'Localidad' => $this -> faker -> city(),


        ];
    }
}
