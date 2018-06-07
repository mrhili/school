<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjctsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('objctypes', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->unique();

            $table->timestamps();
        });

        Schema::create('objcts', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('img')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('state');

            $table->integer('objctype_id')->unsigned()->index();
            $table->foreign('objctype_id')
              ->references('id')
              ->on('objctypes')
              ->onDelete('cascade');

            $table->integer('room_id')->unsigned()->index();
            $table->foreign('room_id')
              ->references('id')
              ->on('rooms')
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
        Schema::dropIfExists('objctypes');
        Schema::dropIfExists('objcts');
    }
}
