<?php

namespace Database\Factories;

use App\Models\Proveedor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class ProveedorFactory extends Factory {

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Proveedor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        
        $tiposGastos = DB::table('tipos_gastos')->pluck('id');
        $calificaciones = DB::table('calificaciones')->pluck('id');
        $figuras = DB::table('figuras')->pluck('id');
        $paises = DB::table('paises')->pluck('id');
        
        return [
            'fechalta' => $this->faker->dateTimeBetween('-2 year'),
            'cif' => $this->faker->unique()->dni(),
            'tipoGasto' => $this->faker->randomElement($tiposGastos),
            'calificacion' => $this->faker->randomElement($calificaciones),
            'figura' => $this->faker->randomElement($figuras),
            'nombre' => 'C.P. ' . $this->faker->name,
            'apellido1' => $this->faker->firstName,
            'apellido2' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'telefono' => $this->faker->randomNumber(9, true),
            'calle' => $this->faker->streetAddress(), //secondaryAddress(),
            'codigopais' => $this->faker->randomNumber(2, true),
            'cp' => '07' . $this->faker->randomNumber(3, true),
            'pais' => $this->faker->randomElement($paises),
            'provincia' => $this->faker->community(),
            'localidad' => $this->faker->asciify(),
            'iban' => $this->faker->iban('ES')
        ];
    }

}
