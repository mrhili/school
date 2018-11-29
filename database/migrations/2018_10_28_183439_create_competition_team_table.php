<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetitionTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competition_team', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('competition_id')->unsigned()->index();
            $table->foreign('competition_id')
              ->references('id')
              ->on('competitions')
              ->onDelete('cascade');

            $table->integer('team_id')->unsigned()->index();
            $table->foreign('team_id')
              ->references('id')
              ->on('teams')
              ->onDelete('cascade');

            $table->integer('points')->nullable();

            $table->boolean('eliminated')->default( false );

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
        Schema::dropIfExists('competition_team');
    }
}