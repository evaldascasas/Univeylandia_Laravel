<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotacioUserAtraccioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votacio_user_atraccio', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_usuari');
            $table->unsignedInteger('id_atraccio');
            $table->foreign('id_usuari')->references('id')->on('users');
            $table->foreign('id_atraccio')->references('id')->on('atraccions');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votacio_user_atraccio');
    }
}
