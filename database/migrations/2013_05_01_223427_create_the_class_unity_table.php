<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTheClassUnityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('the_class_unity', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('unity_id')->unsigned()->index()->nullable();
            $table->foreign('unity_id')
              ->references('id')
              ->on('unities')
              ->onDelete('cascade');

            $table->integer('the_class_id')->unsigned()->index()->nullable();
            $table->foreign('the_class_id')
              ->references('id')
              ->on('classes')
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
        Schema::dropIfExists('the_class_unity');
    }
}
