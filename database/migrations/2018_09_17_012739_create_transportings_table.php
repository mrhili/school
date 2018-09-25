<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transportings', function (Blueprint $table) {
            $table->increments('id');

            $table->string('num_immatriculation');
            $table->string('imm_anterieure')->nullable();
            $table->date('er_mc');
            $table->date('er_mc_country');
            $table->date('mutation')->nullable();
            $table->string('usage');
            $table->string('proprietaire');
            $table->string('adresse');
            $table->date('fin_validite');
            /**/
            $table->string('marque');
            $table->string('type');
            $table->string('genre');
            $table->string('modele');
            $table->string('num_chassis');
            $table->tinyInteger('n_cylindres')->unsigned();
            $table->tinyInteger('puissance_fiscal')->unsigned();
            $table->tinyInteger('nombre_place')->unsigned();
            $table->tinyInteger('poids_total_ac')->nullable()->unsigned();
            $table->tinyInteger('poids_a_vide')->nullable()->unsigned();
            $table->tinyInteger('poids_tmc')->nullable()->unsigned();

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
        Schema::dropIfExists('transportings');
    }
}
