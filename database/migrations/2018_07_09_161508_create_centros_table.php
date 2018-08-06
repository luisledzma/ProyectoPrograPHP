<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCentrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',100);
            $table->string('provincia',15);
            $table->text('direccionExacta');
            $table->boolean('estado')->default(true);
            $table->unsignedInteger('user_id');
            //--Asociarlo con un usuario
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('user_id')->
            references('id')->
            on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('centros', function (Blueprint $table) {
        $table->dropForeign('centros_user_id_foreign');
        $table->dropColum('user_id');
      });
        Schema::dropIfExists('centros');
    }
}
