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

            $table->integer('id_link')->unsigned();

            $table->string('class');

            $table->text('comment');

            

            $table->text('hidden_note')->nullable();

            $table->text('info');

            $table->integer('by_admin')->unsigned()->index()->nullable();
            $table->foreign('by_admin')
              ->references('id')
              ->on('users')
              ->onDelete('set null');

            $table->integer('for_user')->unsigned()->index()->nullable();
            $table->foreign('for_user')
              ->references('id')
              ->on('users')
              ->onDelete('set null');

            $table->string('for_exterior_name')->nullable();

            $table->string('for_exterior_info')->nullable();

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
