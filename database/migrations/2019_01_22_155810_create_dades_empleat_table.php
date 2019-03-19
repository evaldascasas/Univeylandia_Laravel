<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDadesEmpleatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dades_empleats', function (Blueprint $table) {
          $table->increments('id');
          $table->string('codi_seg_social')->unique();
          $table->string('num_nomina')->unique();
          $table->string('IBAN');
          $table->string('especialitat');
          $table->string('carrec');
          $table->date('data_inici_contracte');
          $table->date('data_fi_contracte');
          $table->unsignedInteger('id_horari');
          $table->foreign('id_horari')->references('id')->on('horaris');
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
        Schema::dropIfExists('dades_empleats');
    }
}
