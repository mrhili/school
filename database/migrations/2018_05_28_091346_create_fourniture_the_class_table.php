<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFournitureTheClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fourniture_the_class', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('fourniture_id')->unsigned()->index();
            $table->foreign('fourniture_id')
              ->references('id')
              ->on('fournitures')
              ->onDelete('cascade'); 

            $table->integer('the_class_id')->unsigned()->index();
            $table->foreign('the_class_id')
              ->references('id')
              ->on('the_classes')
              ->onDelete('cascade');


            $table->tinyInteger('howmany')->default(0);


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
        Schema::dropIfExists('fourniture_the_class');
    }
}
