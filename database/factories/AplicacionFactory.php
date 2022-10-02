<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AplicacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'IdPreinscripcion' => $this->faker->numberBetween(1,2),
            'IdPais'=> $this->faker->numberBetween(1,16),
            'NombreUsuario' => $this->faker->name(),
            'CorreoElectronico' => $this->faker->safeEmail(),
            'NumeroTelefono' => $this->faker->text(8),
            'NombreEquipo' => $this->faker->text(50),
            'Categorias' => $this->faker->randomElement(["+30","+30,+35","+35,+40,+45"]),
            'EstadoAplicacion' => $this->faker->randomElement(["aceptado","rechazado","Pendiente"]),
            'created_at' => now()
        ];
    }
}
