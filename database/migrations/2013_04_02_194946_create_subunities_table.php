<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subunities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();

            //wich sub level is

            $table->text('disc')->nullable();


            $table->integer('unity_id')->unsigned()->index()->nullable();
            $table->foreign('unity_id')
              ->references('id')
              ->on('unities')
              ->onDelete('set null');

            //by

            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')
              ->references('id')
              ->on('users')
              ->onDelete('set null');

            //for

            $table->integer('school_d')->unsigned()->index()->nullable();
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
        Schema::dropIfExists('subunities');
    }
}
