<?php

namespace Database\Factories;

use App\Models\Equipo;
use App\Models\Persona2;
use Illuminate\Database\Eloquent\Factories\Factory;

class TecnicoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'IdEquipo' => Equipo::factory(),
            'IdCategoria' => $this->faker->numberBetween(1,7),
            'IdPersona' => Persona2::factory(),
            'RolesTecnicos' => $this->faker->randomElement(["Entrenador","Primer asistente",
            "Segundo asistente","Médico","Psicólogo","Masajista","Delegado"]),
            'created_at' => now(),
            'updated_at' => now()

        ];
    }
}
