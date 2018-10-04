<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagePartialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_partial', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('partial_id')->unsigned()->index();
            $table->foreign('partial_id')
              ->references('id')
              ->on('partials')
              ->onDelete('cascade');

            $table->integer('page_id')->unsigned()->index();
            $table->foreign('page_id')
              ->references('id')
              ->on('pages')
              ->onDelete('cascade');

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
        Schema::dropIfExists('page_partial');
    }
}
