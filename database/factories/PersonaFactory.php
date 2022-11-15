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
            'NombrePersona' => $this->faker->randomElement(['Jose','Jorge','Victor','Miguel','Pedro','Fernando','Felix','Oscar','Julio','Juan','Luis']),
            'ApellidoPaterno' => $this->faker->randomElement(['Mamani','Vargas','Rodriguez','Garcia','Perez','Flores','Condori','Gonzales','Cruz','Lopez','Martinez']),
            'ApellidoMaterno' => $this->faker->randomElement(['Mamani','Vargas','Rodriguez','Garcia','Perez','Flores','Condori','Gonzales','Cruz','Lopez','Martinez']),
            'FechaNacimiento' => $this->faker->randomElement(['1980-09-09']),
            'SexoPersona' => $this->faker->randomElement(['Masculino']),
            'Edad' => $this->faker-> randomElement([42]),
            'Foto' => 'uploads\persona.jpg',
            //"Nacionalidad" => $this->faker->text(15),
            "NacionalidadPersona" => $this->faker->randomElement(['Brasileño','Chileno','Colombiano'
            ,'Trinitense','Argentino','Venezolano','Uruguayo','Guyanés','Peruano','Ecuatoriano','Boliviano','Paraguayo']),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
