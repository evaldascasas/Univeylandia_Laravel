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
            $table->string('cognom1');
            $table->string('cognom2')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->date('data_naixement');
            $table->string('adreca');
            $table->string('ciutat');
            $table->string('provincia');
            $table->string('codi_postal');
            $table->string('tipus_document');
            $table->string('numero_document');
            $table->string('sexe');
            $table->string('telefon');
            $table->unsignedInteger('id_rol');
            $table->foreign('id_rol')->references('id')->on('rols');
            $table->unsignedInteger('id_dades_empleat')->nullable();
            $table->foreign('id_dades_empleat')->references('id')->on('dades_empleats');
            $table->boolean('actiu');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
