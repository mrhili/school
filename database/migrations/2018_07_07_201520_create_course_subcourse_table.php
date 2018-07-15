<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseSubcourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_subcourse', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('course_id')->unsigned()->index();
            $table->foreign('course_id')
              ->references('id')
              ->on('courses')
              ->onDelete('cascade');


            $table->integer('subcourse_id')->unsigned()->index();
            $table->foreign('subcourse_id')
              ->references('id')
              ->on('subcourses')
              ->onDelete('cascade');

            $table->integer('sorting');
            
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
        Schema::dropIfExists('course_subcourse');
    }
}
