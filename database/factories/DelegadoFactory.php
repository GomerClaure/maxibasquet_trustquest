<?php


namespace Database\Factories;

use App\Models\Persona;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DelegadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'IdUsuario' => User::factory()->asignarRol(4),
           // 'IdPersona'=> Persona::factory(),
            'FechaRegistroDelegado' => now(),
            'TelefonoDelegado' => $this->faker->phoneNumber(8),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
