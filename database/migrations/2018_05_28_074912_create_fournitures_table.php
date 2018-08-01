<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFournituresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fournitures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('additional_info')->nullable();
            $table->string('for')->nullable();
            $table->boolean('required');
            $table->float('average_price')->nullable();
            $table->smallInteger('got')->default(0)->unsigned();
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
        Schema::dropIfExists('fournitures');
    }
}
