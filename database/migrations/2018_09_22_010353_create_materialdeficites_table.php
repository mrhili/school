<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialdeficitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

      //maybe fournitures, rooms, objects, transportings
        Schema::create('materialdeficites', function (Blueprint $table) {
            $table->increments('id');

            $table->tinyInteger('type')->unsigned();
            $table->tinyInteger('id_model')->unsigned();
            $table->text('reason');

            $table->float('price')->unsigned();

            $table->boolean('paid');

            $table->text('return');

            $table->integer('year_id')->unsigned();

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
        Schema::dropIfExists('materialdeficites');
    }
}
