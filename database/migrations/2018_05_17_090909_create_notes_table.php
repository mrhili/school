<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('testyearsubclass_id')->unsigned()->index()->nullable();
            $table->foreign('testyearsubclass_id')
              ->references('id')
              ->on('testyearsubclasses')
              ->onDelete('set null');

            $table->integer('year_id')->unsigned()->index();
            $table->foreign('year_id')
              ->references('id')
              ->on('years')
              ->onDelete('cascade');

            $table->integer('the_class_id')->unsigned()->index()->nullable();
            $table->foreign('the_class_id')
              ->references('id')
              ->on('the_classes')
              ->onDelete('set null');

            $table->integer('subject_id')->unsigned()->index()->nullable();
            $table->foreign('subject_id')
              ->references('id')
              ->on('subjects')
              ->onDelete('set null');

            $table->integer('subject_the_class_id')->nullable()->unsigned()->index();
            $table->foreign('subject_the_class_id')
              ->references('id')
              ->on('subject_the_class')
              ->onDelete('set null');    

            $table->integer('teatcher_id')->unsigned()->index()->nullable();
            $table->foreign('teatcher_id')
              ->references('id')
              ->on('users')
              ->onDelete('set null'); 

            $table->integer('student_id')->unsigned()->index();
            $table->foreign('student_id')
              ->references('id')
              ->on('users')
              ->onDelete('cascade'); 

            $table->boolean('seen')->default(false);

            $table->boolean('test_passed_fine')->default(false);

            $table->float('note')->nullable();

            $table->string('done_minutes');

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
        Schema::dropIfExists('notes');
    }
}
