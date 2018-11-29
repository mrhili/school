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

            $table->integer('student_id')->unsigned()->index();
            $table->foreign('student_id')
              ->references('id')
              ->on('users')
              ->onDelete('cascade');

            $table->boolean('seen')->default(false);

            $table->boolean('test_passed_fine')->default(false);

            $table->float('note')->nullable();

            $table->string('done_minutes')->nullable();

            $table->text('moreinfo')->nullable();

            $table->text('answers')->nullable();

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
