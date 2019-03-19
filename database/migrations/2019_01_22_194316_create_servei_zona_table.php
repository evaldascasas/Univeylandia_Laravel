<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServeiZonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serveis_zones', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_zona');
            $table->foreign('id_zona')->references('id')->on('zones');
            $table->unsignedInteger('id_servei');
            $table->foreign('id_servei')->references('id')->on('serveis');
            $table->unsignedInteger('id_empleat');
            $table->foreign('id_empleat')->references('id')->on('users');
            $table->date('data_inici');
            $table->date('data_fi');
            $table->unsignedInteger('id_estat');
            $table->foreign('id_estat')->references('id')->on('estat_incidencies');
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
        Schema::dropIfExists('serveis_zones');
    }
}
