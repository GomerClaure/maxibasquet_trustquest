<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatosPartidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_partidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("IdEquipo");
            $table->unsignedBigInteger("IdPartido");
            $table->integer("ScoreEquipo");
            $table->timestamps();
            $table->foreign("IdEquipo")->references("IdEquipo")->on('equipos');                        
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
        Schema::dropIfExists('datos_partidos');
    }
}
