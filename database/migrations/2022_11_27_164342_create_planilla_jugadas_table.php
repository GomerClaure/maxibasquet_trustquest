<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePlanillaJugadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planilla_jugadas', function (Blueprint $table) {
            $table->bigIncrements("IdJuego");
            $table->unsignedBigInteger("IdPartido");
            $table->foreign("IdPartido")->references("IdPartido")->on('partidos');
            $table->date("fecha");
            $table->string("equipoVencedor");
            $table->string("equipoPerdedor");
            $table->timestamps();
        });
        DB::statement('ALTER TABLE planilla_jugadas ADD COLUMN primerCuarto integer[]');
        DB::statement('ALTER TABLE planilla_jugadas ADD COLUMN segundoCuarto integer[]');
        DB::statement('ALTER TABLE planilla_jugadas ADD COLUMN tercerCuarto integer[]');
        DB::statement('ALTER TABLE planilla_jugadas ADD COLUMN cuartoCuarto integer[]');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planilla_jugadas');
    }
}
