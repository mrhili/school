<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddclassteatcherpaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addclassteatcherpayments', function (Blueprint $table) {

          /*
            $table->increments('id');

            $table->integer('teatcher_id')->unsigned()->index();
            $table->foreign('teatcher_id')
              ->references('id')
              ->on('users')
              ->onDelete('cascade');

            $table->integer('year_id')->unsigned()->index();
            $table->foreign('year_id')
              ->references('id')
              ->on('years')
              ->onDelete('cascade');

            $table->integer('addclass_id')->unsigned()->index();
            $table->foreign('addclass_id')
              ->references('id')
              ->on('addclasses')
              ->onDelete('cascade');

            $table->date('date')->nullable();

            $table->integer('month_id')->unsigned()->index()->nullable();
            $table->foreign('month_id')
              ->references('id')
              ->on('months')
              ->onDelete('cascade');

            $table->integer('should_be_payed')->default(0)->unsigned();

            $table->integer('payment')->default(0);

            $table->boolean('payment_complete')->default(false);


            $table->timestamps();

            */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addclassteatcherpayments');
    }
}
