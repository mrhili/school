<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('objective');
            $table->text('content');
            $table->text('introduction');
            $table->text('teaser_text')->nullable();
            $table->string('teaser_video')->nullable();
            $table->tinyInteger('teaser_type')->nullable();

            $table->integer('created_by')->unsigned()->index()->nullable();
            $table->foreign('created_by')
              ->references('id')
              ->on('users')
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
        Schema::dropIfExists('courses');
    }
}
