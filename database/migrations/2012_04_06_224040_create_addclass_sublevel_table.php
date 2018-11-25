<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddclassSublevelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addclass_sublevel', function (Blueprint $table) {



            $table->increments('id');

            $table->integer('addclass_id')->unsigned()->index();
            $table->foreign('addclass_id')
              ->references('id')
              ->on('addclasses')
              ->onDelete('cascade');

            $table->integer('sublevel_id')->unsigned()->index()->nullable();
            $table->foreign('sublevel_id')
              ->references('id')
              ->on('sublevels')
              ->onDelete('cascade');

            $table->float('price')->nullable()->unsigned();


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
