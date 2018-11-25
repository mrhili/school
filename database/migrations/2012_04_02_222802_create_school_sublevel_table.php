<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolSublevelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_sublevel', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('school_id')->unsigned()->index();
            $table->foreign('school_id')
              ->references('id')
              ->on('schools')
              ->onDelete('cascade'); 

            $table->integer('sublevel_id')->unsigned()->index();
            $table->foreign('sublevel_id')
              ->references('id')
              ->on('sublevels')
              ->onDelete('cascade');

            $table->float('monthly_price')->unsigned();


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
        Schema::dropIfExists('school_sublevel');
    }
}
