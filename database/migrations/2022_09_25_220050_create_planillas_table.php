<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanillasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planillas', function (Blueprint $table) {
            $table->id("IdPlanilla");
            $table->unsignedBigInteger("IdPartido");
            $table->date("InicioLlenado")->nullable();
            $table->boolean('PrimerCuartoJugado')->nullable();
            $table->boolean('SegundoCuartoJugado')->nullable();
            $table->boolean('TercerCuartoJugado')->nullable();
            $table->boolean('CuartoCuartoJugado')->nullable();
            $table->text("observaciones")->nullable();
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
        Schema::dropIfExists('planillas');
    }
}
