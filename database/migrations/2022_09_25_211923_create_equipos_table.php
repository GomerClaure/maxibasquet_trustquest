<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->id("IdEquipo");
            //$table->unsignedBigInteger("IdDelegado");
            $table->unsignedBigInteger("IdAplicacion");
            $table->string("NombreEquipo")->unique();
            $table->string("LogoEquipo");
            $table->timestamps();
            $table->foreign("IdAplicacion")->references("IdAplicacion")->on('aplicaciones');
            //$table->foreign("IdDelegado")->references("IdDelegado")->on('delegados');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipos');
    }
}
