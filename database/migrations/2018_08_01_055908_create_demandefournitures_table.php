²²²²²²²²²²²²²<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemandefournituresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandefournitures', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('fourniture_id')->unsigned()->index();
            $table->foreign('fourniture_id')
              ->references('id')
              ->on('fournitures')
              ->onDelete('cascade');

            $table->integer('parent_id')->unsigned()->index();
            $table->foreign('parent_id')
              ->references('id')
              ->on('users')
              ->onDelete('set null');

            $table->integer('student_id')->unsigned()->index();
            $table->foreign('student_id')
              ->references('id')
              ->on('users')
              ->onDelete('set null');

            $table->smallInteger('howmany')->unsigned();

            $table->text('message')->nullable();

            $table->float('totalmoney')->unsigned();
            $table->boolean('done')->default(false);


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
        Schema::dropIfExists('demandefournitures');
    }
}
