<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddclassUnityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addschool_unity', function (Blueprint $table) {
            $table->increments('id');

            //NO MODEL

            $table->integer('unity_id')->unsigned()->index()->nullable();
            $table->foreign('unity_id')
              ->references('id')
              ->on('unities')
              ->onDelete('cascade');


            $table->integer('addclass_id')->unsigned()->index()->nullable();
            $table->foreign('addclass_id')
              ->references('id')
              ->on('addclasses')
              ->onDelete('cascade');

            $table->integer('teatcher_id')->unsigned()->index()->nullable();
            $table->foreign('teatcher_id')
              ->references('id')
              ->on('users')
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
        Schema::dropIfExists('addschool_unity');
    }
}
