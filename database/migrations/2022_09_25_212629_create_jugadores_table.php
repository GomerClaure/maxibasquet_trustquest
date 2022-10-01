<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJugadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jugadores', function (Blueprint $table) {
            $table->id("IdJugador");
            $table->unsignedBigInteger("IdEquipo");
            $table->unsignedBigInteger("IdCategoria");
            $table->unsignedInteger("IdPersona");
            $table->integer("EstaturaJugador");
            $table->string("FotoCarnet");
            $table->string("FotoJugador");
            $table->string("PosicionJugador");
            $table->integer("NumeroCamiseta");
            $table->timestamps();
            $table->foreign("IdPersona")->references("IdPersona")->on('personas');
            $table->foreign("IdCategoria")->references("IdCategoria")->on('categorias');
            $table->foreign("IdEquipo")->references("IdEquipo")->on('equipos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jugadores');
    }
}
