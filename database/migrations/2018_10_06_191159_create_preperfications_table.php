<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreperficationsTable extends Migration
{

    public function up()
    {
        Schema::create('preperfications', function (Blueprint $table) {

            $table->increments('id');

            $table->string('title');

            $table->integer('teatchification_id')->unsigned()->index();
            $table->foreign('teatchification_id')
              ->references('id')
              ->on('teatchifications')
              ->onDelete('cascade');

            $table->integer('student_id')->unsigned()->index();
            $table->foreign('student_id')
              ->references('id')
              ->on('users')
              ->onDelete('cascade');

            $table->boolean('get_it')->default(false);

            $table->boolean('present')->default(false);

            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('preperfications');
    }


}
