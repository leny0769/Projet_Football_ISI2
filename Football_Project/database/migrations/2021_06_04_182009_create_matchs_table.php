<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matchs', function (Blueprint $table) {
            $table->id();
            $table->text('DateMatch');
            $table->Integer('ButEquipeExterieur');
            $table->text('ButEquipeDomicile');
            $table->unsignedBigInteger('club_idExterieur');
            $table->foreign('club_idExterieur')
                ->references('id')
                ->on('clubs')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('club_idDomicile');
            $table->foreign('club_idDomicile')
                ->references('id')
                ->on('clubs')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('stade_id');
            $table->foreign('stade_id')
                ->references('id')
                ->on('stades')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('championnat_id');
            $table->foreign('championnat_id')
                ->references('id')
                ->on('championnats')
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
        Schema::dropIfExists('matches');
    }
}
