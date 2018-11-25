<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id');

            //3oumoumu khosiysu

            $table->tinyInteger('type')->default(0);

            $table->string('name')->unique();

            $table->text('description')->unique();

            $table->string('licence')->unique();

            $table->string('img')->nullable();

            $table->string('company')->unique();

            $table->string('city')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('adress')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone2')->nullable();
            $table->string('fix')->nullable();
            $table->string('facebook_profile')->nullable();
            $table->string('facebook_page')->nullable();
            $table->string('git')->nullable();
            $table->string('google_profile')->nullable();
            $table->string('paypal')->nullable();
            $table->string('website')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('youtube')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('email')->unique();

            $table->integer('groupeschool_id')->unsigned()->index()->nullable();
            $table->foreign('groupeschool_id')
              ->references('id')
              ->on('groupeschools')
              ->onDelete('cascade');



            //Config


            $table->tinyInteger('studies_from')->nullable();
            $table->tinyInteger('studies_to')->nullable();

            $table->boolean('transport')->default(true);

            $table->boolean('add_classes')->default(true);

            $table->boolean('online_programme')->default(false);
            


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
        Schema::dropIfExists('schools');
    }
}
