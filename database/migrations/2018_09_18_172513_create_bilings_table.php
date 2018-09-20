<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBilingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

      Schema::create('bils', function (Blueprint $table) {

          $table->increments('id');
          $table->string('service');
          $table->float('price')->unsigned();
          $table->timestamps();

      });

        Schema::create('bilings', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('bil_id')->unsigned()->index();
            $table->foreign('bil_id')
              ->references('id')
              ->on('bils')
              ->onDelete('cascade');

            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')
              ->references('id')
              ->on('users')
              ->onDelete('cascade');

            $table->boolean('toke')->default(false);
            $table->boolean('payed')->default(false);

            $table->integer('token_id')->unsigned()->nullable()->index();
            $table->foreign('token_id')
              ->references('id')
              ->on('users')
              ->onDelete('set null');

            $table->integer('year_id')->unsigned()->index();
            $table->foreign('year_id')
              ->references('id')
              ->on('years')
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
        Schema::dropIfExists('bils');
        Schema::dropIfExists('bilings');
    }
}
