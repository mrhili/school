<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComponentPartialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('component_partial', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('page_partial_id')->unsigned()->index();
            $table->foreign('page_partial_id')
              ->references('id')
              ->on('page_partial_id')
              ->onDelete('cascade');

            $table->integer('component_id')->unsigned()->index();
            $table->foreign('component_id')
              ->references('id')
              ->on('components')
              ->onDelete('cascade');
            //json
            $table->text('json');

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
        Schema::dropIfExists('component_partial');
    }
}
