<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtributsProducteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atributs_producte', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom')->references('id')->on('tipus_producte');;
            $table->string('mida')->nullable();
            $table->string('tickets_viatges')->nullable();
            $table->string('foto_path')->nullable();
            $table->string('foto_path_aigua')->nullable();
            $table->integer('preu');
            $table->string('id_atraccio')->nullable();
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
        Schema::dropIfExists('atributs_producte');
    }
}
