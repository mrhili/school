<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('meetingtype_id')->unsigned()->index();
            $table->foreign('meetingtype_id')
              ->references('id')
              ->on('meetingtypes')
              ->onDelete('cascade');

            $table->string('name');
            $table->string('object');
            $table->text('body');
            $table->dateTime('time');
            $table->dateTime('end_time');
            $table->string('place');

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
        Schema::dropIfExists('meetings');
    }
}
