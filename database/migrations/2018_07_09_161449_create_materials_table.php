<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre',100);
            $table->string('imagen',100);
            $table->decimal('precio');
            $table->string('color',25);
            $table->integer('tipomaterial_id')->unsigned();
            $table->foreign('tipomaterial_id')->references('id')->on('tipomaterials')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('materials', function (Blueprint $table) {
        $table->dropForeign('materials_tipomaterial_id_foreign');
        $table->dropColum('tipomaterial_id');
      });
        Schema::dropIfExists('materials');
    }
}
