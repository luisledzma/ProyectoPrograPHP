<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBilleteravirtualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billeteravirtuals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario');
            $table->integer('cantEcoDisponibles');
            $table->integer('cantEcoPorTiquetes');
            $table->integer('cantEcoTotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('billeteravirtuals');
    }
}
