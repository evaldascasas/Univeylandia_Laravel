<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncidenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidencies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titol');
            $table->text('descripcio');
            $table->unsignedInteger('id_prioritat');
            $table->foreign('id_prioritat')->references('id')->on('tipus_prioritat');
            $table->unsignedInteger('id_estat');
            $table->foreign('id_estat')->references('id')->on('estat_incidencies');
            $table->unsignedInteger('id_usuari_reportador');
            $table->foreign('id_usuari_reportador')->references('id')->on('users');
            $table->unsignedInteger('id_usuari_assignat')->nullable();
            $table->foreign('id_usuari_assignat')->references('id')->on('users');
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
        Schema::dropIfExists('incidencies');
    }
}
