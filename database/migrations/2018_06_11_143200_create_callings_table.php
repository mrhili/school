<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCallingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('callings', function (Blueprint $table) {
            $table->increments('id');

            $table->boolean('required');

            $table->integer('caller_id')->unsigned()->index();
            $table->foreign('caller_id')
              ->references('id')
              ->on('users')
              ->onDelete('cascade');

            $table->integer('parent_id')->unsigned()->index();
            $table->foreign('parent_id')
              ->references('id')
              ->on('users')
              ->onDelete('cascade');

            $table->string('object');

            $table->dateTime('time1');
            $table->dateTime('time2');
            $table->dateTime('time3');

            $table->boolean('seen')->default( false );
            $table->boolean('agree')->default( false );

            $table->tinyInteger('timeChoosenComming')->nullable();
            $table->dateTime('otherTimeComming')->nullable();

            $table->string('disagrement')->nullable();

            $table->integer('year_id')->unsigned()->index();
            $table->foreign('year_id')
              ->references('id')
              ->on('years')
              ->onDelete('cascade');


            $table->boolean('terminated')->default( false );

            $table->string('result')->nullable();


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
        Schema::dropIfExists('callings');
    }
}
