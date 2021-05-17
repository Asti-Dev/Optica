<?php

namespace Database\Factories;

use App\Models\Proveedor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProveedorFactory extends Factory
{
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
    public function definition()
    {
        $i = 0;
        return [
            'nombre' => $this->faker->company,
            'codigo' => str_pad( $this->faker->unique()->numberBetween(1,20) ,2,'0',STR_PAD_LEFT),
        ];
    }
}
