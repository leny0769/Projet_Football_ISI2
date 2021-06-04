<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJoueurEnActivitésTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joueur_en_activités', function (Blueprint $table) {
            $table->id();
            $table->text("Prénom");
            $table->text("Nom");
            $table->text("Poste");
            $table->timestamps();
            $table->unsignedBigInteger('IDClub');
            $table->foreign('IDClub')
                ->references('id')
                ->on('Clubs')
                ->onDelete('Cascade')
                ->onUpdate('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('joueur_en_activités');
    }
}
