<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSublevelSubunityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sublevel_subunity', function (Blueprint $table) {
            $table->increments('id');

            $table->foreign('subunity_id')
              ->references('id')
              ->on('subunities')
              ->onDelete('cascade');

            $table->foreign('sublevel_id')
              ->references('id')
              ->on('sublevels')
              ->onDelete('cascade');

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
        Schema::dropIfExists('sublevel_subunity');
    }
}
