<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcourses', function (Blueprint $table) {
            $table->increments('id');

            $table->tinyInteger('language')->default(0);


            $table->text('title');


            $table->integer('finishing_time');

            $table->text('introduction');

            $table->text('body');

            $table->text('outro');

            $table->text('to_grasp');


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
        Schema::dropIfExists('subcourses');
    }
}
