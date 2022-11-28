<?php

namespace Database\Factories;

use App\Models\Juez;
use Illuminate\Database\Eloquent\Factories\Factory;

class JuecesPorPartidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'IdPartido' => $this->faker->name(),
            'IdJuez' => Juez::factory(),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
    public function cargarDatosPartido($idPartido,$tipoJuez){
        return $this->state([
            'IdPartido' => $idPartido,
            'TipoJuez' => $tipoJuez,
        ]);
    }
}
