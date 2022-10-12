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
    private $idEquipo;
    
    public function asignarEquipo($idEquipo){
        $this->idEquipo = $idEquipo;
        return $this->state([
            'IdEquipo' => $idEquipo,
        ]);
    }

    public function definition()
    {
        return [
            
            'IdCategoria' => $this->faker->numberBetween(1,7),
            'IdPersona' => Persona::factory(),
            //'PesoJugador' => $this->faker->randomFloat(2,80,150),
            'PesoJugador' => $this->faker->numberBetween(1,99),
            'EstaturaJugador' => $this->faker->randomFloat(2,1,2),
            'FotoCarnet' => 'uploads\carnet.jpg',
            'PosicionJugador' => $this->faker->randomElement(["BASE","ESCOLTA","ALERO","ALA-PIVOT","PIVOT"]),
            'NumeroCamiseta' => $this->faker->numberBetween(0,99),
            //'HabilitacionJugador' => true,
            'created_at' => now(),
            'updated_at' => now()


        ];
    }
}
