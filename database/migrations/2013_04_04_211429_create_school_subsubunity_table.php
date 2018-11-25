<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolSubsubunityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_subsubunity', function (Blueprint $table) {
            $table->increments('id');

            $table->foreign('subsubunity_id')
              ->references('id')
              ->on('subsubunities')
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
