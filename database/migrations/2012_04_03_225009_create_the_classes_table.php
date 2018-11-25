<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTheClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('the_classes', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->tinyInteger('limit_students')->default(30);

            $table->integer('sublevel_id')->unsigned()->index();
            $table->foreign('sublevel_id')
              ->references('id')
              ->on('sublevels')
              ->onDelete('cascade');

            $table->integer('school_id')->unsigned()->index();
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
        Schema::dropIfExists('the_classes');
    }
}
