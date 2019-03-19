<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titol');
            $table->text('descripcio');
            $table->unsignedInteger('id_usuari');
            $table->unsignedInteger('categoria');
            $table->string('path_img');
            $table->foreign('id_usuari')->references('id')->on('users');
            $table->foreign('categoria')->references('id')->on('categories');
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
        Schema::dropIfExists('noticies');
    }
}
