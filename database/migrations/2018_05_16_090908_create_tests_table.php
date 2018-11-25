<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table){
            $table->increments('id');
            $table->tinyInteger('kind');
            $table->string('title')->unique();

            $table->text('info')->nullable();


            $table->boolean('ready')->default(false);
            $table->integer('time_minutes')->default(60)->unsigned();
            $table->text('answers')->nullable();

            $table->text('body')->nullable();
            $table->text('notes')->nullable();


            $table->integer('subunity_id')->unsigned()->index();
            $table->foreign('subunity_id')
              ->references('id')
              ->on('subunities')
              ->onDelete('set null');



            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')
              ->references('id')
              ->on('users')
              ->onDelete('set null');

            //public private

            $table->tinyInteger('type')->default(0);

            $table->integer('school_id')->unsigned()->index()->nullable();
            $table->foreign('school_id')
              ->references('id')
              ->on('schools')
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
        Schema::dropIfExists('tests');
    }
}
