<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingpopulatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetingpopulatings', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('meeting_id')->unsigned()->index();
            $table->foreign('meeting_id')
              ->references('id')
              ->on('meetings')
              ->onDelete('cascade');

            $table->integer('creator_id')->unsigned()->index()->nullable();
            $table->foreign('creator_id')
              ->references('id')
              ->on('users')
              ->onDelete('set null');

            $table->integer('invited_id')->unsigned()->index();
            $table->foreign('invited_id')
              ->references('id')
              ->on('users')
              ->onDelete('cascade');

            $table->text('note')->nullable();

            $table->boolean('present')->default(false);







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
        Schema::dropIfExists('meetingpopulatings');
    }
}
