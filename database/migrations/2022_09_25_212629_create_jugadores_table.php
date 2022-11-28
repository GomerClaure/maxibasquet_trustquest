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
            $table->float("EstaturaJugador",3,2);
            $table->integer("PesoJugador");
            $table->string("FotoCarnet");
            $table->string("PosicionJugador");
            $table->integer("NumeroCamiseta");
            $table->softDeletes();
            $table->timestamps();
          
            $table->foreign("IdPersona")->references("IdPersona")->on('personas')->onDelete('cascade');
            $table->foreign("IdCategoria")->references("IdCategoria")->on('categorias')->onDelete('cascade');
            $table->foreign("IdEquipo")->references("IdEquipo")->on('equipos')->onDelete('cascade');

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
