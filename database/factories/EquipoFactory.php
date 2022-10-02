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
            'IdAplicacion' => Aplicacion::factory(),
            'NombreEquipo' => $this->faker->name(),
            'LogoEquipo' => $this->faker->imageUrl(100,100,'logo',true),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
