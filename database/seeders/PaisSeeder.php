<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("paises")->insert([
            'NombrePais'=>'Brasil',
            'CodigoPais'=>'+55',
            'Nacionalidad'=>'Brasileño',
            'Region'=>'Sudamerica',
            'created_at'=>now()
        ]);
        DB::table("paises")->insert([
            'NombrePais'=>'Chile',
            'CodigoPais'=>'+56',
            'Nacionalidad'=>'Chileno',
            'Region'=>'Sudamerica',
            'created_at'=>now()
        ]);
        DB::table("paises")->insert([
            'NombrePais'=>'Aruba',
            'CodigoPais'=>'+297',
            'Nacionalidad'=>'Arubeño',
            'Region'=>'Sudamerica',
            'created_at'=>now()
        ]);
        DB::table("paises")->insert([
            'NombrePais'=>'Trinidad y Tobago',
            'CodigoPais'=>'+1',
            'Nacionalidad'=>'Trinitense',
            'Region'=>'Sudamerica',
            'created_at'=>now()
        ]);
        DB::table("paises")->insert([
            'NombrePais'=>'Argentina',
            'CodigoPais'=>'+54',
            'Nacionalidad'=>'Argentino',
            'Region'=>'Sudamerica',
            'created_at'=>now()
        ]);
        DB::table("paises")->insert([
            'NombrePais'=>'Venezuela',
            'CodigoPais'=>'+58',
            'Nacionalidad'=>'Venezolano',
            'Region'=>'Sudamerica',
            'created_at'=>now()
        ]);
        DB::table("paises")->insert([
            'NombrePais'=>'Uruguay',
            'CodigoPais'=>'+598',
            'Nacionalidad'=>'Uruguayo',
            'Region'=>'Sudamerica',
            'created_at'=>now()
        ]);
        DB::table("paises")->insert([
            'NombrePais'=>'Guyana',
            'CodigoPais'=>'+592',
            'Nacionalidad'=>'Guyanés',
            'Region'=>'Sudamerica',
            'created_at'=>now()
        ]);
        DB::table("paises")->insert([
            'NombrePais'=>'Peru',
            'CodigoPais'=>'+51',
            'Nacionalidad'=>'Peruano',
            'Region'=>'Sudamerica',
            'created_at'=>now()
        ]);
        DB::table("paises")->insert([
            'NombrePais'=>'Ecuador',
            'CodigoPais'=>'+593',
            'Nacionalidad'=>'Ecuatoriano',
            'Region'=>'Sudamerica',
            'created_at'=>now()
        ]);
        DB::table("paises")->insert([
            'NombrePais'=>'Bolivia',
            'CodigoPais'=>'+591',
            'Nacionalidad'=>'Boliviano',
            'Region'=>'Sudamerica',
            'created_at'=>now()
        ]);
        DB::table("paises")->insert([
            'NombrePais'=>'Paraguay',
            'CodigoPais'=>'+595',
            'Nacionalidad'=>'Paraguayo',
            'Region'=>'Sudamerica',
            'created_at'=>now()
        ]);
        DB::table("paises")->insert([
            'NombrePais'=>'Colombia',
            'CodigoPais'=>'+57',
            'Nacionalidad'=>'Colombiano',
            'Region'=>'Sudamerica',
            'created_at'=>now()
        ]);
        DB::table("paises")->insert([
            'NombrePais'=>'Caribe Neerlandés Curazao',
            'CodigoPais'=>'+599',
            'Nacionalidad'=>'Antillano neerlandés',
            'Region'=>'Sudamerica',
            'created_at'=>now()
        ]);
        DB::table("paises")->insert([
            'NombrePais'=>'Surinam',
            'CodigoPais'=>'+597',
            'Nacionalidad'=>'Surinamés',
            'Region'=>'Sudamerica',
            'created_at'=>now()
        ]);
        DB::table("paises")->insert([
            'NombrePais'=>'Guayana Francesa',
            'CodigoPais'=>'+594',
            'Nacionalidad'=>'Guayanés',
            'Region'=>'Sudamerica',
            'created_at'=>now()
        ]);
    }
}
