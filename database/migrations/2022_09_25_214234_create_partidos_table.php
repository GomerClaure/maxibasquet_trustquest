<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partidos', function (Blueprint $table) {
            $table->bigIncrements("IdPartido");
            $table->unsignedBigInteger("IdCategoria");
            $table->time("HoraPartido");
            $table->string("LugarPartido");
            $table->date("FechaPartido");
            $table->enum("EstadoPartido",["curso","finalizado","espera"]);
            $table->timestamps();
            //$table->foreign("IdCategoria")->references("IdCategoria")->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partidos');
    }
}
