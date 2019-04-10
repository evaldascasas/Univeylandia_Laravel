<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserEntraAtraccioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_entra_atraccio', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_usuari')->nullable();
            $table->unsignedInteger('id_atraccio');
            $table->unsignedInteger('id_ticket');
            $table->foreign('id_usuari')->references('id')->on('users');
            $table->foreign('id_ticket')->references('id')->on('productes');
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
        Schema::dropIfExists('user_entra_atraccio');
    }
}
