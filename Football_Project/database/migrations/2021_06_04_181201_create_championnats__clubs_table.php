<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChampionnatsClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('championnats_clubs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('championnat_id');
            $table->foreign('championnat_id')
                ->references('id')
                ->on('championnats')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('championnats__clubs');
    }
}
