<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJuecesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jueces', function (Blueprint $table) {
            $table->id("IdJuez");
            $table->unsignedBigInteger("IdUsuario");
            $table->unsignedBigInteger("IdPersona");
            $table->timestamps();
            $table->foreign("IdUsuario")->references("id")->on('users');
            $table->foreign("IdPersona")->references("IdPersona")->on('personas');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jueces');
    }
}
