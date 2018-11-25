<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddclassTeatcherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addclass_teatcher', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('addclass_id')->unsigned()->index()->nullable();
            $table->foreign('addclass_id')
              ->references('id')
              ->on('addclasses')
              ->onDelete('cascade');

            $table->integer('teatcher_id')->unsigned()->index()->nullable();
            $table->foreign('teatcher_id')
              ->references('id')
              ->on('users')
              ->onDelete('cascade');

            $table->float('giveback_price')->unsigned();


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
        Schema::dropIfExists('addclass_teatcher');
    }
}
