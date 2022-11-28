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
            'ApellidoPaterno' => $this->faker->unique()->randomElement(['Ramirez','Torres','Flores','Rivera','Gomez','Diaz','Cruz','Morales','Reyes','Gutierrez','Ortiz','Chavez','Ramos','Ruiz','Mendoza','Alvarez','Jimenez','Castillo','Vasquez','Romero','Moreno','Gonzales','Herrera','Aguilar','Medina','Vargas','Castro','Guzman','Mendez','Fernandez','Munoz','Salazar','Garza','Soto','Vazquez','Alvarado','Contreras','Delgado','Pena','Rios','Guerrero','Sandoval','Ortega','Estrada','Nunez','Maldonado','Dominguez','Valdez','Vega','Santiago','Espinoza','Rojas','Silva','Mejia','Marquez','Juarez','Padilla','Luna','Acosta',
            'Figueroa','Cortez','Avila','Navarro','Molina','Ayala','Campos','Santos','Carrillo','Cervantes','Duran','Lara','Cabrera','Solis','Miranda','Robles','Fuentes','Salinas','Velasquez','Ochoa','Aguirre','Leon','Cardenas','Deleon','Rivas','Calderon','Rosales','Serrano','Castaneda','Trujillo','Montoya','Pacheco','Orozco','Ibarra','Valencia','Gallegos','Velazquez','Camacho','Guerra','Colon','Escobar','Suarez','Salas','Smith','Macias','Villarreal','Barrera','Franco','Zamora','Delacruz','Santana','Roman','Pineda','Trevino','Rangel','Arias','Lozano','Zuniga','Mercado','Melendez','Mora','Valenzuela','Andrade','Meza',
            'Villanueva','Galvan','Tapia','Zavala','Sosa','Velez','Cisneros','Benitez','Acevedo','Bonilla','Arroyo','Villa','Rubio','Bautista','Arellano','Johnson','Ponce','Huerta','Beltran','Rocha','Villegas','Cantu','Montes','Barajas','Mata','Murillo','Rosas','Cortes','Guevara','Salgado','Rosario','Palacios','Davila','Williams','Esparza','Cuevas','Cordova','Martin','Trejo','Quintero','Marin','Bravo','Corona','Medrano','Nava','Magana','Dejesus','Brown','Portillo','Villalobos','Enriquez','Esquivel','Avalos','Bernal','Lugo','Duarte','Cano','Parra','Espinosa','Galindo','Delarosa','Quintana','Alfaro','Jaramillo','Lucero',
            'Correa','Jones','Reyna','Sierra','Nieves','Saldana','Quinones','Peralta','Becerra','Amaya','Saenz','Tovar','Vera','Leal','Cardona','Aguilera','Zapata','Baez','Ventura','Barrios','Castellanos','Carrasco','Saucedo','Gallardo','Hurtado','Guillen','Alonso','Osorio','Muniz','Zepeda','Escobedo','Arredondo','Segura']),
            'ApellidoMaterno' => $this->faker->unique()->randomElement(['Valle','Moran','Davis','Velasco','Carranza','Felix','Renteria','Blanco','Olvera','Cordero','Quiroz','Lemus','Caballero','Chacon','Coronado','Orellana','Madrigal','Delatorre','Miller','Granados','Paredes','Quezada','Carmona','Leyva','Hinojosa','Rosado','Vigil','Varela','Yanez','Bermudez','Romo','Aviles','Montano','Nieto','Vela','Uribe','Serna','Gamez','Navarrete','Rico','Olivares','Gil','Paz','Baca','Burgos','Canales','Anaya','Barragan','Barron','Madrid','Arevalo','Benavides','Solano','Reynoso','Rosa','Bustamante','Aragon','Montalvo','Ornelas','Casillas',
            'Tellez','Quintanilla','Wilson','Aleman','Ocampo','Prado','Pina','Carbajal','Valadez','Ojeda','Godinez','Arreola','Rodriquez','Cuellar','Amador','Fonseca','Pagan','Hidalgo','Sotelo','Venegas','Escamilla','Betancourt','Zarate','Ybarra','Patino','Thomas','Anderson','Lujan','Marrero','Polanco','Escalante','Otero','Marroquin','Arteaga','Taylor','Olivas','Valdes','Linares','Arriaga','Rendon','Feliciano','Casas','Sepulveda','Soriano','Galvez','Ledesma','Banuelos','Brito','Jackson','Barrientos','Zaragoza','Prieto','Aranda','Mondragon','Vallejo','Covarrubias','Najera','Mena','Chavarria','Saavedra','Pulido','Matos','Barraza',
            'Alarcon','Arce','Jaimes','Ceja','Moore','Argueta','Negron','Ordonez','Gamboa','Cerda','Thompson','Valentin','Salcedo','Heredia','Cornejo','Alcala','Alonzo','Moya','Mireles','Saldivar','Cavazos','Pimentel','Longoria','Anguiano','White','Nevarez','Crespo','Zambrano','Balderas','Cazares','Rincon','Ontiveros','Espinal','Alaniz','Toledo','Corral','Torrez','Delossantos','Robledo','Montanez','Bustos','Adame','Palma','Valdivia','Abreu','Holguin','Frias','Acuna','Vidal','Henriquez','Montero','Carrera','Bueno','Ceballos','Batista','Delgadillo','Espino','Clark','Pantoja','Oliva','Negrete','Naranjo','Aponte','Elizondo','Chapa',
            'Solorzano','Aquino','Urbina','Harris','Gaytan','Resendiz','Almanza','Puente','Tamayo','Robinson','Lewis','Monroy','Tejeda','Armenta','Tejada','Perales','Farias','Giron','Villasenor','Lira','Collazo','Noriega','Limon','Lee','Mojica','Solorio','Centeno','Araujo','Banda','Rodrigues','Machado','Aparicio','Soria','Angel','Garay','Walker','Irizarry','Loera','Guajardo','Young','Jasso','Vergara','Ulloa','Jaime','Alcantar','Elias','Garibay','Mares','Tirado']),
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
