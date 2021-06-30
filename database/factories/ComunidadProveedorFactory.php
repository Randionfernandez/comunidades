<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ComunidadProveedor;
use Illuminate\Support\Facades\DB;

class ComunidadProveedorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ComunidadProveedor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $comunidades = DB::table('comunidades')->pluck('id');
        $proveedores = DB::table('proveedores')->pluck('id');
        
        return [
            'comunidad_id' => $this->faker->randomElement($comunidades),
            'proveedor_id' => $this->faker->randomElement($proveedores),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
