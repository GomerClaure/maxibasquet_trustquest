<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAplicacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aplicaciones', function (Blueprint $table) {
            $table->id("IdAplicacion");
            $table->unsignedBigInteger("IdPreinscripcion");
            $table->unsignedBigInteger("IdPais");
            $table->string("NombreUsuario",100);
            $table->string("CorreoElectronico",100);
            $table->string("NumeroTelefono",20);
            $table->string("NombreEquipo");
            $table->string("Categorias");
            $table->enum("EstadoAplicacion",["aceptado","rechazado","Pendiente"]);
            $table->text("observaciones")->nullable();
            $table->timestamps();
            $table->foreign("IdPreinscripcion")->references("IdPreinscripcion")->on('preinscripciones');
            $table->foreign("IdPais")->references("IdPais")->on('paises');            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aplicaciones');
    }
}
