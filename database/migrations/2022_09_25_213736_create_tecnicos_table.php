<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTecnicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tecnicos', function (Blueprint $table) {
            $table->id("IdTecnicos");
            $table->unsignedBigInteger("IdEquipo");
            $table->unsignedBigInteger("IdCategoria");
            $table->unsignedInteger("IdPersona");
            $table->string("RolesTecnicos");
            $table->string("FotoCarnet");
            $table->softDeletes();
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
        Schema::dropIfExists('tecnicos');
    }
}
