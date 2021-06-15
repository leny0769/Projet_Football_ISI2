<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatsJoueursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stats__joueurs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('saison_id');
            $table->foreign('saison_id')
                ->references('id')
                ->on('saisons')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('joueur_id');
            $table->foreign('joueur_id')
                ->references('id')
                ->on('joueurs')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->Integer('NombreTitularisation');
            $table->Integer('NombreMatch');
            $table->text('Minutes');
            $table->Integer('Buts');
            $table->Integer('PassesDécisives');
            $table->text('TirsCadrés');
            $table->text('CartonJaune');
            $table->text('CartonRouge');
            $table->text('Centres');
            $table->text('TaclesReussis');
            $table->text('Interceptions');
            $table->Integer('ButCSC');
            $table->text('Fautes');
            $table->text('HorsJeu');
            $table->text('Passes');
            $table->text('PassesReussis');
            $table->text('CornersGagnés');
            $table->text('TirsBloqués');
            $table->text('Touches');
            $table->text('ArretsGardien');
            $table->Integer('ButsEncaissésGardien');
            $table->Integer('CleanSheetsGardien');
            $table->text('PenaltyMarqué');
            $table->text('PenaltyManqué');
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
        Schema::dropIfExists('stats__joueurs');
    }
}
