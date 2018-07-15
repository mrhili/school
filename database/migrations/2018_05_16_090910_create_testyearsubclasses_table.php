<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestyearsubclassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testyearsubclasses', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('subject_the_class_id')->unsigned()->index()->nullable();
            $table->foreign('subject_the_class_id')
              ->references('id')
              ->on('subject_the_class')
              ->onDelete('set null');

            $table->integer('subject_id')->unsigned()->index()->nullable();
            $table->foreign('subject_id')
              ->references('id')
              ->on('subjects')
              ->onDelete('set null');

            $table->integer('the_class_id')->unsigned()->index()->nullable();
            $table->foreign('the_class_id')
              ->references('id')
              ->on('the_classes')
              ->onDelete('set null');


            $table->integer('test_id')->unsigned()->index()->nullable();
            $table->foreign('test_id')
              ->references('id')
              ->on('tests')
              ->onDelete('set null');

            $table->integer('year_id')->unsigned()->index()->nullable();
            $table->foreign('year_id')
              ->references('id')
              ->on('years')
              ->onDelete('set null');

            $table->integer('teatcher_id')->unsigned()->index()->nullable();
            $table->foreign('teatcher_id')
              ->references('id')
              ->on('users')
              ->onDelete('set null');



            $table->boolean('publish')->default(false);

            $table->boolean('navigator')->default(true);

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
        Schema::dropIfExists('testyearsubclasses');
    }
}
