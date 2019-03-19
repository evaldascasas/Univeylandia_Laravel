<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLiniaVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linia_ventes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_venta');
            $table->foreign('id_venta')->references('id')->on('venta_productes');
            $table->unsignedInteger('producte');
            $table->foreign('producte')->references('id')->on('productes');
            $table->integer('quantitat');
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
        Schema::dropIfExists('linia_ventes');
    }
}
