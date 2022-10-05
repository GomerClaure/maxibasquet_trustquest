<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;


class PersonaFactory extends Factory
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
            'SexoPersona' => $this->faker->randomElement(["Masculino","Femenino"]),
            'Edad' => $this->faker-> numberBetween(30,75),
            'Foto' => $this->faker->imageUrl(360,360,'people',true),
            "Nacionalidad" => $this->faker->text(15),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
