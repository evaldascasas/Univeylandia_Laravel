<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtraccioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atraccions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom_atraccio')->unique();
            $table->unsignedInteger('tipus_atraccio');
            $table->foreign('tipus_atraccio')->references('id')->on('tipus_atraccions');
            $table->date('data_inauguracio');
            $table->unsignedInteger('altura_min');
            $table->unsignedInteger('altura_max');
            $table->boolean('accessibilitat');
            $table->boolean('acces_express');
            $table->text('descripcio');
            $table->string('path');
            $table->string('votacions')->default('0');
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
        Schema::dropIfExists('atraccions');
    }
}
