<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolSubunityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_subunity', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('subunity_id')->unsigned()->index()->nullable();
            $table->foreign('subunity_id')
              ->references('id')
              ->on('subunities')
              ->onDelete('cascade');

            $table->integer('school_id')->unsigned()->index()->nullable();
            $table->foreign('school_id')
              ->references('id')
              ->on('schools')
              ->onDelete('cascade');


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
        Schema::dropIfExists('school_subunity');
    }
}
