<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJugadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jugadas', function (Blueprint $table) {
            $table->id("IdJugada");
            $table->unsignedBigInteger("IdJugador");
            $table->unsignedBigInteger("IdPartido");
            $table->string("Equipo",5);
            $table->integer("TipoJugada");
            $table->integer("CuartoJugada");
            $table->time("HoraJugada");
            $table->timestamps();
            $table->foreign("IdJugador")->references("IdJugador")->on('jugadores');            
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
        Schema::dropIfExists('jugadas');
    }
}
