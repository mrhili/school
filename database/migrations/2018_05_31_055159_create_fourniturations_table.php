<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFourniturationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fourniturations', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('the_class_id')->unsigned()->index();
            $table->foreign('the_class_id')
              ->references('id')
              ->on('the_classes')
              ->onDelete('cascade');

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

            $table->integer('fourniture_id')->unsigned()->index();
            $table->foreign('fourniture_id')
              ->references('id')
              ->on('fournitures')
              ->onDelete('cascade');

            $table->boolean('exist')->default(false);
            $table->boolean('confirmed')->default(false);
            $table->boolean('rejected')->default(false);

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
        Schema::dropIfExists('fourniturations');
    }
}
