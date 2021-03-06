<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserspaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userspayments', function (Blueprint $table) {
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

            $table->integer('month_id')->unsigned()->index();
            $table->foreign('month_id')
              ->references('id')
              ->on('months')
              ->onDelete('cascade');

            $table->integer('should_be_payed')->default(0)->unsigned();
            $table->integer('cnss_payment')->default(0)->unsigned();

            $table->integer('payment')->default(0);

            $table->boolean('payment_complete')->default(false);

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
        Schema::dropIfExists('teatcherspayments');
    }
}
