<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class Persona2Factory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'CiPersona' => $this->faker->unique()->randomNumber(8,true),
            'NombrePersona' => $this->faker->name(),
            'ApellidoPaterno' => $this->faker->word(),
            'ApellidoMaterno' => $this->faker->word(),
            'FechaNacimiento' => $this->faker->date(),
            'SexoPersona' => "Masculino",
            'Edad' => $this->faker-> numberBetween(30,75),
            'Foto' => "uploads\portrait_70_Kerr_Headshot_4.30.48_PM.jpg",
            "NacionalidadPersona" => $this->faker->text(15),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
