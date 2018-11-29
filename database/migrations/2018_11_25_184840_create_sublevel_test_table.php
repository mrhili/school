<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSublevelTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sublevel_test', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('sublevel_id')->unsigned()->index();
            $table->foreign('sublevel_id')
              ->references('id')
              ->on('sublevels')
              ->onDelete('cascade');

            $table->integer('test_id')->unsigned()->index();
            $table->foreign('test_id')
              ->references('id')
              ->on('tests')
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
        Schema::dropIfExists('sublevel_test');
    }
}
