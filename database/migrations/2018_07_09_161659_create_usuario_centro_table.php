<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioCentroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_centro', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('usuario_id')->unsigned();
            $table->integer('centro_id')->unsigned();
            $table->foreign('usuario_id')->
            references('id')->
            on('users')->onDelete('cascade');
            $table->foreign('centro_id')->
            references('id')->
            on('centros')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('usuario_centro', function (Blueprint $table) {
        $table->dropForeign('usuario_centro_usuario_id_foreign');
        $table->dropColumn('usuario_id');
        $table->dropForeign('usuario_centro_centro_id_foreign');
        $table->dropColumn('centro_id');

    });
        Schema::dropIfExists('usuario_centro');
    }
}
