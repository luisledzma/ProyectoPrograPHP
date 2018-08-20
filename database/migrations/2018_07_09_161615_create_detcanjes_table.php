<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetcanjesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detcanjes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('cantidad');
            $table->integer('subtotal');
            $table->integer('enccanje_id')->unsigned();
            $table->foreign('enccanje_id')->references('id')->on('enccanjes')->onDelete('cascade');
            $table->integer('material_id')->unsigned();
            $table->foreign('material_id')->references('id')->on('materials')->onDelete('cascade');
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
      Schema::table('detcanjes', function (Blueprint $table) {
        $table->dropForeign('detcanje_enccanje_id_foreign');
        $table->dropColum('enccanje_id');
        $table->dropForeign('detcanje_material_id_foreign');
        $table->dropColum('material_id');
      });
        Schema::dropIfExists('detcanjes');
    }
}
