<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('cognom1')->nullable();
            $table->string('cognom2')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->date('data_naixement')->nullable();
            $table->string('adreca')->nullable();
            $table->string('ciutat')->nullable();
            $table->string('provincia')->nullable();
            $table->string('codi_postal')->nullable();
            $table->enum('tipus_document', ['DNI', 'NIE'])->nullable();
            $table->string('numero_document')->nullable();
            $table->enum('sexe', ['Home', 'Dona'])->nullable();
            $table->string('telefon')->nullable();
            $table->unsignedInteger('id_rol');
            $table->foreign('id_rol')->references('id')->on('rols');
            $table->unsignedInteger('id_dades_empleat')->nullable();
            $table->foreign('id_dades_empleat')->references('id')->on('dades_empleats');
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
            $table->rememberToken();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
