<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonthlypaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthlypays', function (Blueprint $table) {
            $table->increments('id');
            $table->increments('name');
            $table->increments('type');
            $table->integer('month_id')->unsigned()->index();
            $table->foreign('month_id')
              ->references('id')
              ->on('months')
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
        Schema::dropIfExists('monthlypays');
    }
}
