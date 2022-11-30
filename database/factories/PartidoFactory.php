<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PartidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $d=mktime(10, 30, 00, 1, 12, 2022);
        return [
            'IdPartido' => $this->faker->name(),
            'HoraPartido' => '10:00:00',
            'LugarPartido' => 'Canchita Umss',
            'FechaPartido' => date("Y-m-d h:i:sa", $d),
            'EstadoPartido' => 'espera',
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
    public function setCategoria($idCategoria){
        return $this->state([
            'IdCategoria' => $idCategoria,
        ]);
    }
}
