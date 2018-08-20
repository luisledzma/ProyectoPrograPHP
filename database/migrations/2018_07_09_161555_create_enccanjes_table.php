<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnccanjesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enccanjes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->date('fecha');
            $table->integer('total');
            $table->integer('consecutivo')->unsigned();
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('centro_id')->unsigned();
            $table->foreign('centro_id')->references('id')->on('centros')->onDelete('cascade');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('enccanjes', function (Blueprint $table) {
        $table->dropForeign('enccanje_usuario_id_foreign');
        $table->dropColum('usuario_id');
        $table->dropForeign('enccanje_centro_id_foreign');
        $table->dropColum('centro_id');
      });
        Schema::dropIfExists('enccanjes');
    }
}
