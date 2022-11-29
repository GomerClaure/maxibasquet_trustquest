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
        return  [
            'IdAplicacion' => $this->faker->unique()->randomElement([51,52,53,54,55,56,57,58,59,60]),
            'NombreEquipo' => $this->faker->name(),
            'LogoEquipo' => 'uploads\logo.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ];

        
    }


}
