<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id("IdPersona");
            $table->integer("CiPersona")->unique();
            $table->string("NombrePersona",30);
            $table->string("ApellidoPaterno",30);
            $table->string("ApellidoMaterno",30)->nullable();
            $table->date("FechaNacimiento");
            $table->string("SexoPersona",10);
            $table->integer("Edad");
            $table->string("Foto");
            $table->string("Nacionalidad",25);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
