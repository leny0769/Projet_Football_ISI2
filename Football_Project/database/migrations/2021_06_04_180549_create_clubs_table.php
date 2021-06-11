<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clubs', function (Blueprint $table) {
            $table->id();
            $table->text('Clé');
            $table->text('Nom');
            $table->text('NomComplet');
            $table->text('Ville');
            $table->text('SiteWeb');
            $table->text('DateFondation');
            $table->text('Couleur1');
            $table->text('Couleur2');
            $table->text('Couleur3');
            $table->text('Surnom1');
            $table->text('Surnom2');
            $table->text('Surnom3');
            $table->text('LogoURL');
            $table->unsignedBigInteger('stade_id')->nullable();
            $table->foreign('stade_id')
                ->references('id')
                ->on('stades')
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
        Schema::dropIfExists('clubs');
    }
}
