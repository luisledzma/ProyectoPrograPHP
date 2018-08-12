<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCuponTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_cupon', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('cupon_id');
            $table->timestamps();

            $table->unique(['user_id', 'cupon_id']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('cupon_id')->references('id')->on('cupons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('user_cupon', function (Blueprint $table) {
        $table->dropForeign('user_cupon_user_id_foreign');
        $table->dropColumn('user_id');
        $table->dropForeign('user_cupon_cupon_id_foreign');
        $table->dropColumn('cupon_id');

    });
        Schema::dropIfExists('user_cupon');
    }
}
