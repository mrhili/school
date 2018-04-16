<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            /*common*/
            $table->increments('id');
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->boolean('gender')->nullable();
            $table->date('birth_date')->nullable();
            $table->date('birth_place')->nullable();
            $table->string('city')->nullable(); 
            $table->string('zip_code')->nullable();
            $table->string('adress')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('img')->nullable();
            $table->smallInteger('role')->default(0);


            /* parent */
            $table->string('profession')->nullable();
            $table->boolean('family_situation')->nullable();
            /* teatcher */
            $table->string('cv')->nullable();
            /* secreariat */

            /* admin */

            /* master */







            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
