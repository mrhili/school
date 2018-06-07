<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('roomtypes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->timestamps();
        });
        
        Schema::create('etages', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('number')->unsigned()->unique();
            $table->timestamps();
        });
        
        
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('img')->nullable();
            $table->string('space');
            $table->text('description')->nullable();
            $table->integer('roomtype_id')->unsigned()->index();
            $table->foreign('roomtype_id')
              ->references('id')
              ->on('roomtypes')
              ->onDelete('cascade'); 
              
            $table->integer('etage_id')->unsigned()->index();
            $table->foreign('etage_id')
              ->references('id')
              ->on('etages')
              ->onDelete('cascade'); 
            
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
        Schema::dropIfExists('roomtypes');
        Schema::dropIfExists('etages');
        Schema::dropIfExists('rooms');
    }
}
