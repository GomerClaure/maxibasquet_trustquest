<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriasPorEquipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias_por_equipo', function (Blueprint $table) {
            $table->bigIncrements("Id");
            $table->unsignedBigInteger("IdEquipo");
            $table->unsignedBigInteger("IdCategoria");
            $table->unsignedBigInteger("IdCampeonato");
            $table->timestamps();
            $table->foreign("IdCategoria")->references("IdCategoria")->on('categorias');
            $table->foreign("IdEquipo")->references("IdEquipo")->on('equipos'); 
            $table->foreign("IdCampeonato")->references("IdCampeonato")->on('campeonatos'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias_por_equipo');
    }
}
