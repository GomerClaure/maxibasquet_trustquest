<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJuecesPorPartidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jueces_por_partidos', function (Blueprint $table) {
            $table->bigIncrements("Id");
            $table->unsignedBigInteger("IdPartido");
            $table->unsignedBigInteger("IdJuez");
            $table->string("TipoJuez");
            $table->timestamps();
            $table->foreign("IdPartido")->references("IdPartido")->on('partidos');
            $table->foreign("IdJuez")->references("IdJuez")->on('jueces');           

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jueces_por_partidos');
    }
}
