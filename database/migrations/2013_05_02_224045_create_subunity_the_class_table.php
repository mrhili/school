<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubunityTheClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subunity_the_class', function (Blueprint $table) {
            $table->increments('id');
$table->integer('subunity_id')->unsigned()->index();
            $table->foreign('subunity_id')
              ->references('id')
              ->on('subunities')
              ->onDelete('cascade');
$table->integer('the_class_id')->unsigned()->index();
            $table->foreign('the_class_id')
              ->references('id')
              ->on('the_classes')
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
        Schema::dropIfExists('subunity_the_class');
    }
}
