<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilisateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->bigIncrements('IDUtilisateur');
            $table->string("Prenom",50);
            $table->string("Nom",50);
            $table->string("NomCompagnie",50);
            $table->dateTime('DateInscription')->default((new DateTime())->format('Y-m-d H:i:s'));
            $table->string('NumeroTelephone',30);
            $table->string('Courriel',100)->unique();
            $table->string('ZoneService',50)->nullable();
            $table->string('Photo')->nullable();
            $table->string('Status', 50)->default('Disponibe'); // Disponible - occupé - invisible - congé
            $table->string('Password', 255);
            $table->int('IDAdresse');
            $table->int('IDCategorie')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timesstamps();
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
        Schema::dropIfExists('utilisateurs');
    }
}
