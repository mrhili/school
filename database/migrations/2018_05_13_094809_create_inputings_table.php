<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInputingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inputings', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('monthlypay_id')->unsigned()->index();
            $table->foreign('monthlypay_id')
              ->references('id')
              ->on('monthlypays')
              ->onDelete('cascade');

            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')
              ->references('id')
              ->on('users')
              ->onDelete('cascade');

            $table->integer('year_id')->unsigned()->index();
            $table->foreign('year_id')
              ->references('id')
              ->on('years')
              ->onDelete('cascade');

            $table->integer('school_id')->unsigned()->index();
            $table->foreign('school_id')
              ->references('id')
              ->on('years')
              ->onDelete('cascade');

            



            $table->integer('payment')->default(0);

            $table->integer('should_pay')->default(350);

            $table->boolean('payment_complete')->default(false);



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
        Schema::dropIfExists('studiesinputs');
    }
}
