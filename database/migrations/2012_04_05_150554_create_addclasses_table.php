<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddclassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addclasses', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->tinyInteger('limit_students')->default(30);

            $table->date('start_date');
            $table->date('end_date');

            $table->integer('school_id')->unsigned()->index()->nullable();
            $table->foreign('school_id')
              ->references('id')
              ->on('schools')
              ->onDelete('cascade');

              //monthly daily

            $table->tinyInteger('type_payments')->unsigned();
            $table->float('price')->unsigned();

            $table->text('info')->unsigned();


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
        Schema::dropIfExists('addschools');
    }
}
