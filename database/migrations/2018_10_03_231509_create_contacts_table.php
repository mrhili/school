<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();

            $table->string('tel')->nullable();

            $table->string('email')->nullable();

            $table->integer('user_id')->unsigned()->nullable()->index();
            $table->foreign('user_id')
              ->references('id')
              ->on('users')
              ->onDelete('set null');

            $table->text('body');

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
        Schema::dropIfExists('contacts');
    }
}
