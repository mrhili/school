<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingpopulatingRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetingpopulatingratings', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('meetingpopulating_id')->unsigned()->index();
            $table->foreign('meetingpopulating_id')
              ->references('id')
              ->on('meetingpopulatings')
              ->onDelete('cascade');

              $table->integer('user_id')->unsigned()->index();
              $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');


              $table->integer('rating_id')->unsigned()->index();
              $table->foreign('rating_id')
                ->references('id')
                ->on('ratings')
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
        Schema::dropIfExists('meetingpopulatingratings');
    }
}
