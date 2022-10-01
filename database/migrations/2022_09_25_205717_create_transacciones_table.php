<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transacciones', function (Blueprint $table) {
            $table->id("IdTransaccion");
            $table->unsignedBigInteger("IdAplicacion");
            $table->bigInteger("NumeroTransaccion");
            $table->string("NumeroCuenta")->nullable();
            $table->integer("MontoTransaccion");
            $table->date("FechaTransaccion");
            $table->string("FotoVaucher");
            $table->timestamps();
            $table->foreign("IdAplicacion")->references("IdAplicacion")->on('aplicaciones');            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transacciones');
    }
}
