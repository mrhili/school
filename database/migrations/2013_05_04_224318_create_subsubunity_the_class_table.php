<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubsubunityTheClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subsubunity_the_class', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('the_class_id')->unsigned()->index()->nullable();
            $table->foreign('the_class_id')
              ->references('id')
              ->on('the_classes')
              ->onDelete('cascade');


            $table->integer('subsubunity_id')->unsigned()->index()->nullable();
            $table->foreign('subsubunity_id')
              ->references('id')
              ->on('subsubunities')
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
        Schema::dropIfExists('subsubunity_the_class');
    }
}
