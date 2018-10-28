<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subunities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();

            $table->integer('unity_id')->unsigned()->index()->nullable();
            $table->foreign('unity_id')
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
        Schema::dropIfExists('subunities');
    }
}
