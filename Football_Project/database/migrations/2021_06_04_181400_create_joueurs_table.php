<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJoueursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joueurs', function (Blueprint $table) {
            $table->id();
            $table->text('Prénom');
            $table->text('Nom');
            $table->text('Poste');
            $table->text('PiedFort');
            $table->text('Taille');
            $table->text('Poids');
            $table->text('DateNaissance');
            $table->text('VilleNaissance');
            $table->text('Nationalité');
            $table->text('PhotoURL');
            $table->text('TypeJoueur');
            $table->text('Numéro');
            $table->unsignedBigInteger('club_id');
            $table->foreign('club_id')
                ->references('id')
                ->on('clubs')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('joueurs');
    }
}
