<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observations', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('observer_id')->unsigned()->index();
            $table->foreign('observer_id')
              ->references('id')
              ->on('users')
              ->onDelete('cascade'); 

            $table->integer('observed_id')->unsigned()->index();
            $table->foreign('observed_id')
              ->references('id')
              ->on('users')
              ->onDelete('cascade');

            $table->integer('year_id')->unsigned()->index();
            $table->foreign('year_id')
              ->references('id')
              ->on('years')
              ->onDelete('cascade');

            $table->string('title');

            $table->text('observation')->nullable();

            $table->tinyInteger('type');

            $table->boolean('seen')->default(false);

            $table->boolean('reported')->default(false);

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
        Schema::dropIfExists('observations');
    }
}
