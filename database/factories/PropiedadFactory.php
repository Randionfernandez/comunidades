<?php

namespace Database\Factories;

use App\Models\Propiedad;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class PropiedadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Propiedad::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        $comunidad = $this->faker->randomElement(DB::table('comunidades')->pluck('id'));
        $usuario = $this->faker->randomElement(DB::table('users')->pluck('id'));
        $tipoPropiedad = $this->faker->randomElement(DB::table('tipos_propiedad')->pluck('codigo'));
        $parte = $this->faker->randomDigitNotZero();
        
        /*while(count(DB::table('propiedades')->where('comunidad_id', '=', $comunidad)->where('parte', '=', $parte)->get())) {
            dd( DB::table('propiedades')->where('comunidad_id', '=', $comunidad)->where('parte', '=', $parte)->get() );
            $parte = $this->faker->randomDigitNotZero();
        }*/
        
        //var_dump(DB::table('propiedades')->where('comunidad_id', '=', $comunidad)->where('parte', '=', $parte));
        //echo $comunidad . " parte " . $parte . " \n ";
        
        return [
            'comunidad_id' => $comunidad,
            'user_id' => $usuario,
            'denominacion' => $this->faker->randomDigitNotZero() . $this->faker->randomLetter(),
            'parte' => $parte,
            'coeficiente' => $this->faker->randomDigitNotZero(),
            'tipo' => $tipoPropiedad,
            'observaciones' => $this->faker->text()
        ];
    }
}