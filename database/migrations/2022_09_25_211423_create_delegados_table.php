<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDelegadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delegados', function (Blueprint $table) {
            $table->id("IdDelegado");
            $table->unsignedBigInteger("IdPersona");
            $table->unsignedBigInteger("IdUsuario");
            $table->string("NumeroDelegado",20);
            $table->timestamps();
            $table->foreign("IdPersona")->references("IdPersona")->on('personas');            
            $table->foreign("IdUsuario")->references("id")->on('users');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delegados');
    }
}
