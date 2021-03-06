<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectTheClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_the_class', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('subject_id')->unsigned()->index();
            $table->foreign('subject_id')
              ->references('id')
              ->on('subjects')
              ->onDelete('cascade');

            $table->integer('the_class_id')->unsigned()->index();
            $table->foreign('the_class_id')
              ->references('id')
              ->on('the_classes')
              ->onDelete('cascade');

              $table->integer('year_id')->unsigned()->index();
              $table->foreign('year_id')
                ->references('id')
                ->on('years')
                ->onDelete('cascade');

            $table->tinyInteger('parameter')->unsigned();

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
        Schema::dropIfExists('subject_the_class');
    }
}
