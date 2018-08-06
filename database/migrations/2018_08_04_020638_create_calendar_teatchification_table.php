<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalendarTeatchificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendar_teatchification', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('teatchification_id')->unsigned()->index();
            $table->foreign('teatchification_id')
              ->references('id')
              ->on('teatchifications')
              ->onDelete('cascade');

            $table->integer('calendar_id')->unsigned()->index();
            $table->foreign('calendar_id')
              ->references('id')
              ->on('calendars')
              ->onDelete('cascade');

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
        Schema::dropIfExists('calendar_teatchification');
    }
}
