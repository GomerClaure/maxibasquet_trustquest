<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCredencialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credenciales', function (Blueprint $table) {
            $table->id("IdCredencial");
            $table->unsignedBigInteger("IdPersona");
            $table->string("CodigoQR")->unique();
            $table->softDeletes();
            $table->timestamps();
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
        Schema::dropIfExists('credenciales');
    }
}
