<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubsubunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subsubunities', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('subunity_id')->unsigned()->index()->nullable();
            $table->foreign('subunity_id')
              ->references('id')
              ->on('unities')
              ->onDelete('set null');

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
        Schema::dropIfExists('subsubunities');
    }
}
