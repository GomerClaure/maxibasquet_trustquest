<?php

namespace Database\Factories;

use App\Models\Equipo;
use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

class JugadorFactory extends Factory
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
            'IdPersona' => Persona::factory(),
            'PesoJugador' => $this->faker->randomFloat(2,80,150),
            'AlturaJugador' => $this->faker->randomFloat(2,170,250),
            'FotosCarnet' => $this->faker->imageUrl(360,360,'people',true),
            'PosicionJugador' => $this->faker->randomElement(["BASE","ESCOLTA","ALERO","ALA-PIVOT","PIVOT"]),
            'NumeroCamiseta' => $this->faker->numberBetween(0,99),
            'HabilitacionJugador' => true,
            'created_at' => now(),
            'updated_at' => now()
            

        ];
    }
}
