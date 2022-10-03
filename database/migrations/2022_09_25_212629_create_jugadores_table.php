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
            $table->float("PesoJugador",3,2);
            $table->float("AlturaJugador",3,2);
            $table->string("FotosCarnet");
            $table->string("PosicionJugador");
            $table->integer("NumeroCamiseta");
            $table->string("Nacionalidad",25);
            $table->boolean("HabilitacionJugador");
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
