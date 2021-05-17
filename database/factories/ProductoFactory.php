<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Producto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'barcode' => $this->faker->userName,
            'proveedor' => $this->faker->company,
            'marca' => $this->faker->lastName,
            'modelo' => $this->faker->lastName,
            'color' => $this->faker->colorName,
            'costo' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 5),
            'precio_unitario' =>$this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 105),
            'stock' => $this->faker->randomNumber($nbDigits = 3, $strict = true),
            'fecha_adquisicion' => now(),
        ];
    }
}
