<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArbitrosPorPartidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arbitros_por_partidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("IdPartido");
            $table->unsignedBigInteger("IdArbitro");
            $table->string("TipoArbitro");
            $table->timestamps();
            $table->foreign("IdPartido")->references("IdPartido")->on('partidos');
            $table->foreign("IdArbitro")->references("IdArbitro")->on('arbitros');            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arbitros_por_partidos');
    }
}
