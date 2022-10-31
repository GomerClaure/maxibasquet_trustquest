<?php

namespace Database\Factories;

use App\Models\Persona;
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
            'IdPersona' => Persona::factory(),
            'RolesTecnicos' => $this->faker->randomElement(["Entrenador principal","Entrenador asistente","Preparador físico","Medico","Asistente tecnico","Asistente estadistico"]),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
    public function asignarEquipoCategoria($idEquipo,$categoria){
        $this->idEquipo = $idEquipo;
        return $this->state([
            'IdEquipo' => $idEquipo,
            'IdCategoria' => $categoria,
            'FotoCarnet' => 'uploads\carnet.jpg',
        ]);
    }
}
