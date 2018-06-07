<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_categories', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->string('model');

            $table->string('icon');

            $table->tinyInteger('kind');

            $table->tinyInteger('role');

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
        Schema::dropIfExists('history_categories');
    }
}
