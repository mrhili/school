<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallets', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('history_id')->unsigned()->index();
            $table->foreign('history_id')
              ->references('id')
              ->on('histories')
              ->onDelete('set null');


              $table->integer('transparancy_id')->nullable()->unsigned()->index();
              $table->foreign('transparancy_id')
                ->references('id')
                ->on('trancparancies')
                ->onDelete('set null');


            $table->boolean('mines')->default(false);

            $table->float('amount');

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
        Schema::dropIfExists('wallets');
    }
}
