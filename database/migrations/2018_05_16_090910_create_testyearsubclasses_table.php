<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestyearsubclassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testyearsubclasses', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('subunity_the_class_id')->unsigned()->index()->nullable();
            $table->foreign('subunity_the_class_id')
              ->references('id')
              ->on('subunity_the_class')
              ->onDelete('set null');


            $table->integer('test_id')->unsigned()->index()->nullable();
            $table->foreign('test_id')
              ->references('id')
              ->on('tests')
              ->onDelete('set null');

            $table->integer('year_id')->unsigned()->index()->nullable();
            $table->foreign('year_id')
              ->references('id')
              ->on('years')
              ->onDelete('set null');

            $table->integer('teatcher_id')->unsigned()->index()->nullable();
            $table->foreign('teatcher_id')
              ->references('id')
              ->on('users')
              ->onDelete('set null');

              $table->text('before_test')nullable();


            $table->boolean('publish')->default(false);

            $table->boolean('req_publish')->default(false);

            $table->date('end')->nullable();

            $table->boolean('navigator')->default(true);

            $table->boolean('is_exercise')->default(true);

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
        Schema::dropIfExists('testyearsubclasses');
    }
}
