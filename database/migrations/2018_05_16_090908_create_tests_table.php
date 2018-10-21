<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table){
            $table->increments('id');
            $table->tinyInteger('kind');
            $table->string('title')->unique();
            $table->boolean('ready')->default(false);
            $table->integer('time_minutes')->default(60)->unsigned();
            $table->text('answers')->nullable();

            $table->text('body')->nullable();
            $table->text('notes')->nullable();

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
        Schema::dropIfExists('tests');
    }
}
