<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSublevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sublevels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('level_id')->unsigned()->index();
            $table->foreign('level_id')
              ->references('id')
              ->on('levels')
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
        Schema::dropIfExists('sublevels');
    }
}
