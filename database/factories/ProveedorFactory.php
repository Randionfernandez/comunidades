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
        
        //$provincia = $this->faker->randomElement(DB::table('provincias')->get());
        //$comunidadAutonoma = DB::table('comunidades_autonomas')->get()[$provincia->comunidadAutonoma_id-1];
        $pais = DB::table('paises')->get();
        $actividades = DB::table('actividades')->get();
        
        
        return [
            'fechalta' => $this->faker->dateTimeBetween('-2 year'),
            'doi' => $this->faker->unique()->dni(),
            'nombre' => 'C.P. ' . $this->faker->name,
            'apellidos' => $this->faker->firstName,
            'persona' => $this->faker->randomElement(['fisica', 'juridica']),
            'email' => $this->faker->unique()->safeEmail,
            'telefono1' => $this->faker->randomNumber(9, true),
            'telefono2' => $this->faker->randomNumber(9, true),
            'dir_postal' => $this->faker->streetAddress(), //secondaryAddress(),
            'actividad' => $this->faker->randomElement($actividades),
            'pais' => $pais->codigoISO3,
            'cp' => '07' . $this->faker->randomNumber(3, true),
            //'localidad' => $comunidadAutonoma->id,
            //'provincia' => $provincia->id,
            'localidad' => $this->faker->community(),
            //'localidad' => $this->faker->asciify(),
            'iban' => $this->faker->iban('ES'),
            'comentario' => $this->faker->text
        ];
    }

}
