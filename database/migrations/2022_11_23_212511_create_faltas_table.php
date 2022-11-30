<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaltasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faltas', function (Blueprint $table) {
            $table->id("IdFalta");
            $table->unsignedBigInteger("IdJugador");
            $table->unsignedBigInteger("IdPlanillaJugador");
            $table->string("TipoFalta");
            $table->integer("CantidadTiroLibre");
            $table->timestamps();
            $table->foreign("IdJugador")->references("IdJugador")->on('jugadores');            
            $table->foreign("IdPlanillaJugador")->references("IdPlanillaJugador")->on('planilla_jugadores');      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faltas');
    }
}
