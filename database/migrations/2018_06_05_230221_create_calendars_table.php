<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalendarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendars', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->string('url')->nullable();
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->boolean('is_all_day')->default(false);
            $table->string('background_color')->default('#000');
            $table->boolean('repeated')->default(false);
            $table->boolean('holiday')->default(false);
            //dayly//weeakly//monthly
            $table->tinyInteger('repeated_type')->default(0)->unsigned()->nullable();
            $table->tinyInteger('role');

            $table->datetime('end_repeated_date')->nullable();
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
        Schema::dropIfExists('calendars');
    }
}
