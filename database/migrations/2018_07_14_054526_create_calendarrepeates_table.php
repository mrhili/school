<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalendarrepeatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendarrepeates', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->boolean('is_all_day');
            $table->string('background_color');
            $table->json('dow');

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
        Schema::dropIfExists('calendarrepeates');
    }
}
