<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_payments', function (Blueprint $table) {

          /*ANNULED
            
            $table->increments('id');

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

            $table->integer('the_class_id')->unsigned()->index();
            $table->foreign('the_class_id')
              ->references('id')
              ->on('the_classes')
              ->onDelete('cascade');

            $table->integer('month_id')->unsigned()->index();
            $table->foreign('month_id')
              ->references('id')
              ->on('months')
              ->onDelete('cascade');
            
            //$table->integer('add_classes_pay')->default(0);

            $table->integer('payment')->default(0);

            $table->integer('should_pay')->default(350);

            $table->integer('transport_pay')->default(0);
            $table->integer('month_pay')->default(0);

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
        Schema::dropIfExists('students_payments');
    }
}
