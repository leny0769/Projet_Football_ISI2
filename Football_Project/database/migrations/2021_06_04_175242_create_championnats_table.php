<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChampionnatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('championnats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('saison_id');
            $table->foreign('saison_id')
                ->references('id')
                ->on('saisons')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->text('Nom');
            $table->text('Type');
            $table->text('Format');
            $table->text('Clé');
            $table->unsignedBigInteger('pays_id');
            $table->foreign('pays_id')
                ->references('id')
                ->on('pays')
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
        Schema::dropIfExists('championnats');
    }
}
