<?php

namespace Database\Factories;

use App\Models\Aplicacion;
use Illuminate\Database\Eloquent\Factories\Factory;

class EquipoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'IdAplicacion' => $this->faker->unique()->numberBetween(51,60),
            'NombreEquipo' => $this->faker->name(),
            'LogoEquipo' => 'uploads\logo.png',
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
