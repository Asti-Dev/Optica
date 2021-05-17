<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\Guia;
use Illuminate\Database\Eloquent\Factories\Factory;

class GuiaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Guia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $cliente = Cliente::all()->random();

        return [
            'idclientes' => $cliente->idclientes,
            'nombre_apellido' => $cliente->nombre_apellido,
            'telefono' => $cliente->telefono,
            'direccion' => $cliente->direccion,
            'od_sph' => $this->faker->numerify('+ #.##'),
            'od_cil'=> $this->faker->numerify('+ #.##'),
            'od_eje'=> $this->faker->numerify('+ #.##'),
            'oi_sph'=> $this->faker->numerify('+ #.##'),
            'oi_cil'=> $this->faker->numerify('+ #.##'),
            'oi_eje'=> $this->faker->numerify('+ #.##'),
            'add1'=> $this->faker->numerify('+ #.##'),
            'add2'=> $this->faker->numerify('+ #.##'),
            'dip1'=> $this->faker->numerify('+ #.##'),
            'dip2'=> $this->faker->numerify('+ #.##'),
            'nombre_lente' => $this->faker->word,
            'precio_lente'=> $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 200),
            'precio_otros'=> $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 200),
            'subtotal'=> $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 200),
            'descuento'=> $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 200),
            'total'=> $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 200),
            'cta'=> $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 200),
            'saldo'=> $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 200),
            'observaciones'=> $this->faker->text($maxNbChars = 150)   ,
            'fecha'=> $fecha = $this->faker->date,
            'fecha_entrega_aprox'=> $this->faker->dateTimeBetween($startDate = $fecha, $endDate = '+ 5 months', $timezone = null)
        ];
    }
}
