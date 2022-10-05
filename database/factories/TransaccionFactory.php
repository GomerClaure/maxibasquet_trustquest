<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TransaccionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'IdAplicacion' => $this->faker->unique()->numberBetween(1,10),
            'NumeroTransaccion'=> $this->faker->numberBetween(10000000000,99999999999)."",
            'NumeroCuenta'=> $this->faker->numberBetween(100000000000,999999999999)."",
            'MontoTransaccion' => $this->faker->numberBetween(300,10000),
            'FechaTransaccion' => $this->faker->date("d-m-Y"),
            'FotoVaucher' => $this->faker->text(8).".png",
            'created_at' => now()
        ];
    }
}
