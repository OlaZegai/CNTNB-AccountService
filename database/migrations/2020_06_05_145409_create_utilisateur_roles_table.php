<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilisateurRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilisateur_roles', function (Blueprint $table) {
            $table->bigIncrements('IDUtilisateur')->unsigned;
            $table->integer('IDRole')->unsigned;

            $table->foreign('IDUtilisateur')->references('IDUtilisateur')->on('utilisateurs');
            $table->foreign('IDRole')->references('id')->on('role');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utilisateur_roles');
    }
}
