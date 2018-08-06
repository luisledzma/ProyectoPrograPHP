<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_user', function (Blueprint $table) {
          $table->unsignedInteger('user_id');
          $table->unsignedInteger('tipoUsuario_id');
          $table->timestamps();

          $table->unique(['user_id', 'tipoUsuario_id']);
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          $table->foreign('tipoUsuario_id')->references('id')->on('tipousuarios')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('tipo_user', function (Blueprint $table) {
        $table->dropForeign('tipo_user_user_id_foreign');
        $table->dropColumn('user_id');
        $table->dropForeign('tipo_user_tipo_id_foreign');
        $table->dropColumn('tipoUsuario_id');

    });
      Schema::dropIfExists('tipo_user');
    }
}
