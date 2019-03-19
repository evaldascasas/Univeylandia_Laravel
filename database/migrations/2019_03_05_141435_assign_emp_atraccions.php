<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AssignEmpAtraccions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_emp_atraccions', function (Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('id_empleat');
            $table->foreign('id_empleat')->references('id')->on('users');
            $table->unsignedInteger('id_atraccio');
            $table->foreign('id_atraccio')->references('id')->on('atraccions');
            $table->date('data_inici');
            $table->date('data_fi');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
