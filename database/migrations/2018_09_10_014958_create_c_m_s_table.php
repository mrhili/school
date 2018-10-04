<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCMSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_m_s_s', function (Blueprint $table) {
            $table->increments('id');
            $table->string('txt');
            $table->string('slug')->unique();
            $table->boolean('show')->default(true);
            $table->nestedSet();

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
        $table->dropNestedSet();
        Schema::dropIfExists('c_m_s_s');
    }
}
