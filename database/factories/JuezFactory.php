<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

class JuezFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'IdUsuario' => User::factory()->asignarRol(5),
            'IdPersona'=> Persona::factory(),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
