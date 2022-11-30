<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanillaJugadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planilla_jugadores', function (Blueprint $table) {
            $table->id("IdPlanillaJugador");
            $table->unsignedBigInteger("IdPartido");
            $table->timestamps();
            $table->foreign("IdPartido")->references("IdPartido")->on('partidos');    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planilla_jugadores');
    }
}
