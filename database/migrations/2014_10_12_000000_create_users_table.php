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
            $table->integer('num')->nullable()->unique()->unsigned();
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->string('arabic_name')->nullable();
            $table->string('arabic_last_name')->nullable();
            $table->boolean('gender')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('city')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('adress')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone2')->nullable();
            $table->string('phone3')->nullable();
            $table->string('fix')->nullable();
            $table->string('facebook')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('img')->nullable();
            $table->float('role')->default(0);

            /* student */

            $table->integer('the_class_id')->unsigned()->index()->nullable();
            $table->foreign('the_class_id')
              ->references('id')
              ->on('the_classes')
              ->onDelete('cascade');

            $table->boolean('transport')->default(false);
            $table->boolean('additional_classes')->default(false);

            $table->boolean('fill_payment')->default(false);

            /* parent */
            $table->string('cin')->nullable();
            $table->string('profession')->nullable();
            $table->boolean('family_situation')->nullable();
            /* teatcher */
            $table->string('cv')->nullable();
            $table->boolean('cnss')->nullable();
            $table->string('cnss_id')->nullable();

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
