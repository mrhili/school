<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_link');

            $table->string('class');

            $table->text('comment');

            $table->text('info');

            $table->text('hidden_note')->nullable();

            $table->integer('by-admin')->unsigned()->index()->nullable();
            $table->foreign('by-admin')
              ->references('id')
              ->on('users')
              ->onDelete('set null');

            $table->integer('by-user')->unsigned()->index()->nullable();
            $table->foreign('by-user')
              ->references('id')
              ->on('users')
              ->onDelete('set null');

            $table->string('by-exterior-name')->nullable();

            $table->string('by-exterior-info')->nullable();

            $table->integer('payment')->nullable();

            $table->integer('category_history_id')->unsigned()->index();
            $table->foreign('category_history_id')
              ->references('id')
              ->on('history_categories')
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
        Schema::dropIfExists('histories');
    }
}
